<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $client;

    public function __construct(){
        $this->client = new Client([
            'base_uri' => 'http://localhost:3000'
        ]);
    }

    public function index()
    {
        $response = $this->client->get('/obat');
        $data = json_decode($response->getBody(), true);

        return view('admin.CRUDObat', ['obats' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $response = $this->client->post('/obat', [
            'json' => $request->only(['nama_obat', 'deskripsi', 'url_gambar']),
        ]);

        return redirect()->route('admin.CRUDObat')->with('success', 'Obat baru berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Obat $obat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Obat $obat)
    {
        return redirect()->route('admin.CRUDObat');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Obat $obat)
    {
        $response = $this->client->put("/obat/{$obat->id}", [
            'json' => $request->only(['nama_obat', 'deskripsi', 'url_gambar']),
        ]);

        return redirect()->route('admin.CRUDObat');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Obat $obat)
    {
        $response = $this->client->delete("/obat/{$obat->id}");

        return redirect()->route('admin.CRUDObat');
    }
}
