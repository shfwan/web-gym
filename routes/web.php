<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// User & Guest Routes

Route::get('/', function () {
    return view('home');
});

Route::get('/pelatih', function () {
    return view('pages.pelatih');
});

Route::get('/booking', function () {
    return view('pages.booking');
});

Route::get('/profil', function () {
    return view('pages.profil');
});


// Admin Routes
Route::get("/dashboard", function () {
    return view("pages.dashboard");
});

Route::get("/management", function () {
    return view("pages.management");
});

Route::get("/member", function () {
    return view("pages.member");
});

Route::get('/riwayat', function () {
    return view("pages.riwayat");
});