<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Panduan;

class PanduanController extends Controller
{
    // Menampilkan halaman panduan dengan data panduan atau hasil pencarian
    public function index(Request $request)
    {
        $query = $request->input('cariPanduan');

        if ($query) {
            // Pencarian berdasarkan title
            $panduanList = Panduan::where('title', 'like', '%' . $query . '%')->get();
        } else {
            // Menampilkan semua data jika tidak ada pencarian
            $panduanList = Panduan::all();
        }

        return view('main.panduan', compact('panduanList', 'query'));
    }
}
