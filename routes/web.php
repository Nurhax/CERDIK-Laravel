<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MitraController;

Route::get('/', function () {
    return view('main.landingPage');
});

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

Route::resource('CRUDMitra', MitraController::class); // Automatically register routes like CRUDMitra.index, CRUDMitra.create, etc.

Route::put('CRUDMitra/update/{id}', [MitraController::class, 'update'])->name('CRUDMitra.update'); // Custom update route if needed
Route::post('api/add-mitra', [MitraController::class, 'store']); // Route to add mitra
Route::get('get-mitra-data', [MitraController::class, 'index']); // Route to get mitra data
Route::get('/refresh-mitra', [MitraController::class, 'refreshMitra']); // Route to refresh mitra data
Route::delete('api/delete-mitra/{id}', [MitraController::class, 'destroy'])->name('CRUDMitra.destroy'); // Custom delete route

// Group Routes Main
Route::get('/landingPage', function(){
    return view('main.landingPage');
})->name('landingPage');

Route::get('/mitraKami', function(){
    return view('main.MitraKami');
})->name('mitraKami');

Route::get('/panduan', function(){
    return view('main.panduan');
})->name('panduan');

Route::get('/tentangObat', function(){
    return view('main.tentangObat');
})->name('tentangObat');
