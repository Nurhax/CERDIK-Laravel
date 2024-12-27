<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PanduanController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\MitraController;



Route::get('/', [CarouselController::class, 'index'])->name('landingPage');

// Group Routes Admin
Route::get('/AdminMenu', function(){
    return view('admin.adminMenu');
})->name('adminMenu');

Route::get('/Login', function(){
    return view('admin.login');
})->name('login');

Route::get('/CRUDObat', function(){
    return view('admin.CRUDObat');
})->name('CRUDObat');

    Route::get('/CRUDObat', [ObatController::class, 'index'])->name('admin.CRUDObat');
    Route::post('/CRUDObat/submit', [ObatController::class, 'store'])->name('admin.CRUDObat.submit');
    Route::put('/obats/{obat}', [ObatController::class, 'update'])->name('admin.CRUDObat.update');
    Route::delete('/obats/{obat}', [ObatController::class, 'destroy'])->name('admin.CRUDObat.destroy');
});
Route::resource('CRUDMitra', MitraController::class); // Automatically register routes like CRUDMitra.index, CRUDMitra.create, etc.

Route::put('CRUDMitra/update/{id}', [MitraController::class, 'update'])->name('CRUDMitra.update'); // Custom update route if needed
Route::post('api/add-mitra', [MitraController::class, 'store']); // Route to add mitra
Route::get('get-mitra-data', [MitraController::class, 'index']); // Route to get mitra data
Route::get('/refresh-mitra', [MitraController::class, 'refreshMitra']); // Route to refresh mitra data
Route::delete('api/delete-mitra/{id}', [MitraController::class, 'destroy'])->name('CRUDMitra.destroy'); // Custom delete route


Route::get('/landingPage', [CarouselController::class, 'index'])->name('landingPage');
Route::get('/mitraKami', [MitraController::class, 'getAllData'])->name('mitraKami');

// Route::get('/mitraKami', function(){
//     return view('main.MitraKami');
// })->name('mitraKami');

// Route::get('/panduan', function(){
//     return view('main.panduan');
// })->name('panduan');


Route::get('/panduan', [PanduanController::class, 'index'])->name('panduan');


Route::get('/tentangObat', [ObatController::class, 'getAllObat'])->name('tentangObat');

// Route::get('/tentangObat', function(){
//     return view('main.tentangObat');
// })->name('tentangObat');

