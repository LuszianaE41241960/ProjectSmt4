<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManagementUserController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PengalamanKerjaController;
use App\Http\Controllers\backend\PendidikanController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- 1. File Route Default ---
Route::get('/user', function () {
    return "Halo, ini halaman User";
});

// --- 2. Metode Router yang Tersedia ---
Route::match(['get', 'post'], '/multi-method', function () {
    return "Route ini bisa diakses via GET atau POST";
});

Route::any('/semua', function () {
    return "Route ini merespons semua kata kerja HTTP";
});

// --- 4. Redirect Route ---
Route::redirect('/here', '/there');

Route::get('/there', function () {
    return "Kamu berhasil dialihkan ke sini (There)!";
});

// --- 5. Route View ---
Route::view('/welcome', 'welcome', ['name' => 'Taylor']);

// --- 6. Parameter Opsional ---
Route::get('user-optional/{name?}', function ($name = 'John') {
    return "Nama user adalah: " . $name;
});

// --- 7. Regular Expression Constraints ---
Route::get('user-check/{name}', function ($name) {
    return "Nama valid: " . $name;
})->where('name', '[A-Za-z]+');

Route::get('user-id/{id}', function ($id) {
    return "ID valid (angka): " . $id;
})->where('id', '[0-9]+');

// --- 9. Encoded Forward Slashes ---
Route::get('search/{search}', function ($search) {
    return "Kamu mencari: " . $search;
})->where('search', '.*');

// ---- 1.Generate URL ke Route Bernama ----
Route::get('/profile', function () {
    return 'Halaman Profile';
})->name('profile');

Route::get('/test-url', function () {
    return route('profile');
});

// ---- 2.Memeriksa Rute saat ini ----
Route::get('/profile', function () {
    return 'Halaman Profile';
})->name('profile')->middleware('check.profile');

// ----3. Middleware ----
Route::middleware(['first', 'second'])->group(function () {

    Route::get('user/profile', function (){
        return "MASUK KE ROUTE user/profile";
    });

});

// ---- 4. Namespace ----
Route::namespace('Admin')->group(function(){
    Route::get('/admin-test', function (){
        return 'TEST NAMESPACE';
    });
});

// ---- 5. Subdomain Routing ----
Route::domain('{account}.myapp.test')->group(function () {
    Route::get('/user/{id}', function ($account, $id) {
        return "Subdomain: $account | User ID: $id";
    });
});

// ---- 6. Route Prefixes ----
Route::prefix('admin')->group(function (){
    Route::get('users', function () {
        return 'HALAMAN ADMIN USERS';
    });
});

// ---- 7. Route Name Prefixes ----
Route::name('admin.')->group(function () {
    Route::get('users', function () {
        return "INI ROUTE NOMOR 7 — admin.users";
    });
});

// ACARA 5 membuat controller
Route::resource('management-user', ManagementUserController::class);

// ACARA 6
Route::get("/acara6", function() {
    $nama = "Lusziana Azzahra Putri";
    $pelajaran = ["Algoritma & Pemograman", "Kalkulus", "Pemograman Web"];
    return view("home", compact('nama', 'pelajaran'));
});

// ACARA 7
Route::get('/home7', [HomeController::class, 'index']);

// ACARA 8
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


// ACARA 9 - 11
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/logout', function () {
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/login');
});


// ACARA 12

Route::get('admin/profile', function() {
    return "HALAMAN ADMIN PROFILE";
});

Route::get('acara12', function() {
    return "MIDDLEWARE FIRST & SECOND BERJALAN";
})->middleware('first', 'second');

Route::get('/', function () {
    return "KAMU DITOLAK (UMUR <= 200)";
})->middleware('web');


Route::middleware(['web', 'subscribed'])->group(function () {
    // kosong tapi tidak error
});

Route::get('/cek-umur', function () {
    return "Umur lebih dari 200!";
})->middleware('checkage');

/// ACARA 13 ///
Route::resource('pengalaman_kerja', PengalamanKerjaController::class);
Route::resource('pendidikan', PendidikanController::class);

//// ACARA 17 ////
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PegawaiController;

/// SESION ///
Route::get('/session/create', [SessionController::class, 'create']);
Route::get('/session/show', [SessionController::class, 'show']);
Route::get('/session/delete', [SessionController::class, 'delete']);
/// PEGAWAI ///
Route::get('/pegawai/{nama}', [PegawaiController::class, 'index']);


//// ACARA 18 ////
Route::get('/formulir', [PegawaiController::class, 'formulir']);
Route::post('/formulir/proses', [PegawaiController::class, 'proses']);
Route::get('/cobaerror', 'CobaController@index');
Route::get('/cobaerror/{nama?}', 'CobaController@index');

//// ACARA 19 ////
use App\Http\Controllers\UploadController;

Route::get('/upload', [UploadController::class, 'upload'])->name('upload');
Route::post('/upload/proses', [UploadController::class, 'proses_upload'])->name('upload.proses');
Route::post('/upload/resize', [UploadController::class, 'resize_upload'])->name('upload.resize');

/// ACARA 20 ///
Route::get('/dropzone', [UploadController::class, 'dropzone'])->name('dropzone');
Route::post('/dropzone/store', [UploadController::class, 'dropzone_store'])->name('dropzone.store');


Route::get('/pdf_upload', [UploadController::class, 'pdf_upload'])->name('pdf.upload');
Route::post('/pdf_upload', [UploadController::class, 'pdf_store'])->name('pdf.store');


//// ACARA 21/////
use Illuminate\Http\Request;

use App\Http\Controllers\Backend\ApiPendidikanController;

// default user (boleh dibiarkan)
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});





  


