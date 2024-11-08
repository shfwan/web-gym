<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GymController;
use App\Http\Controllers\LatihanController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PelatihController;
use App\Http\Controllers\ProfilController;
use App\Models\Latihan;
use App\Models\Pelatih;
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

Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.post');
    Route::get('register', [AuthController::class, 'registerIndex'])->name('register');
    Route::get('register', [AuthController::class, 'register'])->name('register.post');
});

Route::get('/', function () {
    return view('home');
});


Route::middleware(['auth'])->group(function () {

    Route::get("logout", [AuthController::class, "logOut"]);
    Route::post("password", [AuthController::class, "changePassword"])->name('password.post');

    // User Member Routes
    Route::get('/pelatih', [PelatihController::class, 'listPelatih'])->middleware('userAccess:member');
    Route::get('/pelatih', [PelatihController::class, 'searchPelatih'])->middleware('userAccess:member')->name('pelatih.search');

    Route::get('/booking', function () {
        return view('pages.booking');
    });

    Route::get('/profil', [ProfilController::class, "index"])->name('profil');


    // Admin Routes
    Route::get("/dashboard", [GymController::class, "index"])->middleware('userAccess:admin');

    Route::get("/management", function () {
        $listPelatih = Pelatih::all();
        $listLatihan = Latihan::all();
        return view('pages.management', ["listPelatih" => $listPelatih, "listLatihan" => $listLatihan]);
    })->middleware('userAccess:admin')->name('management');

    // Pelatih
    Route::post("/managemen/pelatih", [PelatihController::class, "addPelatih"])->middleware('userAccess:admin')->name('pelatih.post');
    Route::get("/management/pelatih", [PelatihController::class, "searchPelatihManagement"])->middleware('userAccess:admin')->name('pelatih.management');
    Route::post("/management/pelatih/{id}", [PelatihController::class, "updatePelatih"])->middleware('userAccess:admin')->name('pelatih.update');
    Route::post("/management/pelatih/{id}", [PelatihController::class, "deletePelatih"])->middleware('userAccess:admin')->name('pelatih.delete');

    // Latihan
    Route::post("/management/latihan", [LatihanController::class, "addLatihan"])->middleware('userAccess:admin')->name('latihan.post');
    Route::post("/management/latihan/{id}", [LatihanController::class, "updateLatihan"])->middleware('userAccess:admin')->name('latihan.update');
    Route::post("/management/latihan/{id}", [LatihanController::class, "deleteLatihan"])->middleware('userAccess:admin')->name('latihan.delete');

    Route::get("/member", [MemberController::class, "index"])->middleware('userAccess:admin')->name('member');
    Route::get("/member", [MemberController::class, "index"])->middleware('userAccess:admin')->name('member.update');
    Route::get("/member", [MemberController::class, "index"])->middleware('userAccess:admin')->name('member.delete');

    Route::get('/riwayat', function () {
        return view("pages.riwayat");
    })->middleware('userAccess:admin');
});
