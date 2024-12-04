<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main.landingPage');
});

//Group Routes Admin
Route::get('/AdminMenu', function(){
    return view('admin.adminMenu');
})->name('adminMenu');

Route::get('/Login', function(){
    return view('admin.login');
})->name('login');

Route::get('/CRUDMitra', function(){
    return view('admin.CRUDMitra');
})->name('CRUDMitra');

Route::get('/CRUDObat', function(){
    return view('admin.CRUDObat');
})->name('CRUDObat');

//Group Routes Main
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