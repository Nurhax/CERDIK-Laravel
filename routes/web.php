<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.login');
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

Route::get('/CURDObat', function(){
    return view('admin.CRUDObat');
})->name('CRUDObat');

//Group Routes Main