<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PanduanController;

Route::get('/', function () {
    return view('main.landingPage');
});

Route::middleware('guest')->group(function(){

});

Route::get('/Login', [AdminController::class, 'tampilLogin'])->name('login');
Route::post('/Login/Submit', [AdminController::class, 'submitLogin'])->name('login.submit');
Route::post('/Logout', [AdminController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function(){
    //Group Routes Admin
    Route::get('/AdminMenu', function(){
        return view('admin.adminMenu');
    })->name('adminMenu');

    Route::get('/CRUDMitra', function(){
        return view('admin.CRUDMitra');
    })->name('CRUDMitra');
    
    Route::get('/CRUDObat', [ObatController::class, 'index'])->name('admin.CRUDObat');
    Route::post('/CRUDObat/submit', [ObatController::class, 'store'])->name('admin.CRUDObat.submit');
    Route::put('/obats/{obat}', [ObatController::class, 'update'])->name('admin.CRUDObat.update');
    Route::delete('/obats/{obat}', [ObatController::class, 'destroy'])->name('admin.CRUDObat.destroy');
});



//Group Routes Main
Route::get('/landingPage', function(){
    return view('main.landingPage');
})->name('landingPage');

Route::get('/mitraKami', function(){
    return view('main.MitraKami');
})->name('mitraKami');

// Route::get('/panduan', function(){
//     return view('main.panduan');
// })->name('panduan');

Route::get('/panduan', [PanduanController::class, 'index'])->name('panduan');


Route::get('/tentangObat', [ObatController::class, 'getAllObat'])->name('tentangObat');

// Route::get('/tentangObat', function(){
//     return view('main.tentangObat');
// })->name('tentangObat');
