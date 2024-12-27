<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Mitra;
use Illuminate\Support\Facades\Storage;

class MitraController extends Controller
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function index()
    {

        try {
            $response = $this->client->get('http://localhost:3001/api/refresh-mitra', [
                'verify' => false, 
            ]);
    
            $mitraData = json_decode($response->getBody()->getContents(), true);
    
            
            if (isset($mitraData['mitra'])) {
                return view('admin.CRUDMitra', ['mitraData' => $mitraData['mitra']]);
            } else {
                return view('admin.CRUDMitra', ['mitraData' => []]);
            }
    
        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to fetch data from the API', 'message' => $e->getMessage()], 500);
        }
    }

    public function getAllData()
    {
        try {
            // Fetch all Mitra data from the database
            $mitraData = Mitra::all();

            // Return the view with the mitra data
            return view('main.mitraKami', ['mitraData' => $mitraData]);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Unable to fetch Mitra data', 'message' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            \Log::info('Request Data:', $request->all());

            $validated = $request->validate([
                'nama' => 'required|string|max:255',
                'sejak' => 'required|string|max:255',
                'link' => 'required|url',
                'img_src' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $mitra = new Mitra();
            $mitra->nama = $validated['nama'];
            $mitra->sejak = $validated['sejak'];
            $mitra->link = $validated['link'];

            if ($request->hasFile('img_src')) {
                $logoPath = $request->file('img_src')->store('uploads', 'public');
                $mitra->img_src = $logoPath;
            }

            $mitra->save();

            return response()->json([
                'message' => 'Mitra added successfully!',
                'mitraId' => $mitra->id,
            ]);
        } catch (\Exception $e) {
            // Log any exceptions
            \Log::error('Error adding Mitra: ' . $e->getMessage());

            return response()->json([
                'error' => 'An error occurred while adding Mitra.',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function refreshMitra()
    {
        try {
            $response = $this->client->get('http://localhost:3001/api/refresh-mitra', [
                'verify' => false, 
            ]);

            $mitraData = json_decode($response->getBody()->getContents(), true);

            return response()->json($mitraData);
        } catch (\Exception $e) {
          
            \Log::error('Error fetching Mitra data: ' . $e->getMessage());
            return response()->json(['error' => 'Unable to fetch data from the API', 'message' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
{
    try {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'sejak' => 'required|string|max:255',
            'link' => 'required|url',
            'img_src' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $mitra = Mitra::findOrFail($id);

        if ($request->hasFile('img_src')) {
            if ($mitra->img_src && Storage::disk('public')->exists($mitra->img_src)) {
                Storage::disk('public')->delete($mitra->img_src);
            }

            $logoPath = $request->file('img_src')->store('uploads', 'public');
            $mitra->img_src = $logoPath;
        }

        $mitra->nama = $validated['nama'];
        $mitra->sejak = $validated['sejak'];
        $mitra->link = $validated['link'];
        $mitra->save();

        return response()->json([
            'message' => 'Mitra updated successfully!',
            'mitraId' => $mitra->id,
        ]);
    } catch (\Exception $e) {
        \Log::error('Error updating Mitra: ' . $e->getMessage());

        return response()->json([
            'error' => 'An error occurred while updating Mitra.',
            'message' => $e->getMessage(),
        ], 500);
    }
}

    public function destroy($id)
    {
        try {
            $mitra = Mitra::findOrFail($id);

            if ($mitra->img_src && Storage::disk('public')->exists($mitra->img_src)) {
                Storage::disk('public')->delete($mitra->img_src);
            }
            $mitra->delete();

            return response()->json([
                'message' => 'Mitra deleted successfully!',
            ]);
        } catch (\Exception $e) {
            \Log::error('Error deleting Mitra: ' . $e->getMessage());

            return response()->json([
                'error' => 'An error occurred while deleting Mitra.',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
