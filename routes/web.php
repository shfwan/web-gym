<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CardMemberController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GymController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\LatihanController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PelatihController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TransactionController;
use App\Models\Latihan;
use App\Models\Pelatih;
use App\Models\Transaction;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    Route::post('register', [AuthController::class, 'register'])->name('register.post');
});

Route::get('/', function () {
    return view('home');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/transaksi/success/{id}', [TransactionController::class, "success"])->name('transaction.success');

    Route::get("logout", [AuthController::class, "logOut"]);
    Route::post("password", [AuthController::class, "changePassword"])->name('password.post');

    // User Member Routes
    Route::get('/pelatih', [PelatihController::class, 'listPelatih'])->middleware('userAccess:member')->name('pelatih');
    Route::get('/pelatih/search', [PelatihController::class, 'searchPelatih'])->middleware('userAccess:member')->name('pelatih.search');

    Route::get('/transaksi', [TransactionController::class, "index"])->name('transaction');

    Route::get('/profil', [ProfilController::class, "index"])->name('profil');
    Route::post('/profil/{id}', [ProfilController::class, "update"])->name('profil.update');
    Route::post('/profil/picture/{id}', [ProfilController::class, "updatePicture"])->name('profil.update-picture');
    Route::post('/profil/picture/delete/{id}', [ProfilController::class, "deletePicture"])->name('profil.delete-picture');
    Route::get('/upgrade_member', [CardMemberController::class, "index"])->name('upgrade');


    // Admin Routes
    Route::get("/dashboard", [DashboardController::class, "index"])->middleware('userAccess:admin')->name('dashboard');

    Route::get("/management", function () {
        $listPelatih = Pelatih::paginate(10);
        return view('pages.management', ["listPelatih" => $listPelatih]);
    })->middleware('userAccess:admin')->name('management');

    // Pelatih
    Route::post("/managemen/pelatih", [PelatihController::class, "addPelatih"])->middleware('userAccess:admin')->name('pelatih.post');
    Route::get("/management/pelatih", [PelatihController::class, "searchPelatihManagement"])->middleware('userAccess:admin')->name('pelatih.management');
    Route::post("/management/pelatih/update/{id}", [PelatihController::class, "updatePelatih"])->middleware('userAccess:admin')->name('pelatih.update');
    Route::post("/management/pelatih/delete/{id}", [PelatihController::class, "deletePelatih"])->middleware('userAccess:admin')->name('pelatih.delete');

    // Latihan
    Route::post("/management/latihan", [LatihanController::class, "addLatihan"])->middleware('userAccess:admin')->name('latihan.post');
    Route::post("/management/latihan/{id}", [LatihanController::class, "updateLatihan"])->middleware('userAccess:admin')->name('latihan.update');
    Route::post("/management/latihan/{id}", [LatihanController::class, "deleteLatihan"])->middleware('userAccess:admin')->name('latihan.delete');

    Route::get("/member", [MemberController::class, "index"])->middleware('userAccess:admin')->name('member');
    Route::get("/member/search", [MemberController::class, "searchMember"])->middleware('userAccess:admin')->name('member.search');
    Route::post("/member", [MemberController::class, "addMember"])->middleware('userAccess:admin')->name('member.post');
    Route::post("/member/update/{id}", [MemberController::class, "updateMember"])->middleware('userAccess:admin')->name('member.update');
    Route::post("/member/delete/{id}", [MemberController::class, "deleteMember"])->middleware('userAccess:admin')->name('member.delete');

    Route::get("/riwayat", [HistoryController::class, "index"])->middleware('userAccess:admin')->name('history');

    // Transaksi
    Route::post('/member/checkout/{id}', [CheckoutController::class, "checkout"])->middleware('userAccess:member')->name('transaction.checkout.card_member');
    Route::post('/pelatih/checkout/{id}', [CheckoutController::class, "checkout"])->middleware('userAccess:member')->name('transaction.checkout');
    Route::post('/cardmember/checkout', [CheckoutController::class, "checkoutCardMember"])->middleware('userAccess:member')->name('transaction.checkoutCardMember');

    // Setting
    Route::get('/setting', [SettingController::class, "index"])->middleware('userAccess:admin')->name('setting');
    Route::post('/setting/card_member', [CardMemberController::class, "addCardMember"])->middleware('userAccess:admin')->name('setting.card.post');
    Route::post('/setting/card_member/update/{id}', [CardMemberController::class, "updateCardMember"])->middleware('userAccess:admin')->name('setting.card.update');
    Route::post('/setting/card_member/delete/{id}', [CardMemberController::class, "deleteCardMember"])->middleware('userAccess:admin')->name('setting.card.delete');
});
