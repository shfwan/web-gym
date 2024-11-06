<?php

use App\Http\Controllers\AuthController;
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

Route::middleware(["guest"])->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/', function () {
        return view('home');
    });
});

Route::middleware(["auth"])->group(function () {

    Route::post("/login", [AuthController::class, "logOut"]);

    // User Memeber Routes
    Route::get('/pelatih', function () {
        return view('pages.pelatih');
    })->middleware('userAccess:member');

    Route::get('/booking', function () {
        return view('pages.booking');
    })->middleware('userAccess:member');

    Route::get('/profil', function () {
        return view('pages.profil');
    })->middleware('userAccess:member');


    // Admin Routes
    Route::get("/dashboard", function () {
        return view("pages.dashboard");
    })->middleware('userAccess:admin');

    Route::get("/management", function () {
        return view("pages.management");
    })->middleware('userAccess:admin');

    Route::get("/member", function () {
        return view("pages.member");
    })->middleware('userAccess:admin');

    Route::get('/riwayat', function () {
        return view("pages.riwa yat");
    })->middleware('userAccess:admin');
});
