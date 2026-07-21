<?php

use App\Models\Room;
use App\Models\Kategori;
use App\Http\Middleware\HakAkses;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AsetController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware'=>['auth','HakAkses:admin']], function(){
    Route::get('/', [DashboardController::class, 'welcome'])->name('welcome');
    Route::get('/aset',[AsetController::class, 'indexaset'])->name('aset');
    Route::get('/hapus/{id}',[AsetController::class, 'hapus'])->name('hapus');
    Route::get('/tambahaset',[AsetController::class, 'tambahaset'])->name('tambahaset');
    Route::post('/insertdata',[AsetController::class, 'insertdata'])->name('insertdata');
    Route::get('/tampildata/{id}',[AsetController::class, 'tampildata'])->name('tampildata');
    Route::post('/editdata/{id}',[AsetController::class, 'editdata'])->name('editdata');
    //KATEGORI
    Route::get('/kategori',[KategoriController::class, 'indexkategori'])->name('kategori');
    Route::get('/tambahkategori',[KategoriController::class, 'tambahkategori'])->name('tambahkategori');
    Route::post('/insertkategori',[KategoriController::class, 'insertkategori'])->name('insertkategori');
    Route::get('/tampilkategori/{id}',[KategoriController::class, 'tampilkategori'])->name('tampilkategori');
    Route::post('/editkategori/{id}',[KategoriController::class, 'editkategori'])->name('editkategori');
    //ROOM
    Route::get('/room',[RoomController::class, 'indexroom'])->name('room');
    Route::get('/tambahroom',[RoomController::class, 'tambahroom'])->name('tambahroom');
    Route::post('/insertroom',[RoomController::class, 'insertroom'])->name('insertroom');
    Route::get('/tampilroom/{id}',[RoomController::class, 'tampilroom'])->name('tampilroom');
    Route::post('/editroom/{id}',[RoomController::class, 'editroom'])->name('editroom');
    //TRANSAKSI PEMINJAMAN 
    Route::get('/transaksipinjam',[PeminjamanController::class, 'transaksipinjam'])->name('transaksipinjam');
    Route::put('/approve/{id}', [PeminjamanController::class, 'updateStatus'])->name('admin.updateStatus');
    Route::get('/peminjaman/{id}', [PeminjamanController::class, 'show'])->name('show');
    // PENGEMBALIAN
    Route::put('/kembalikanPeminjaman{id}',[PeminjamanController::class, 'kembalikanPeminjaman'])->name('kembalikanPeminjaman');
    Route::get('/notifikasi/peminjaman', [PeminjamanController::class, 'notifikasipinjam'])->name('notifikasipinjam');
    Route::get('/peminjaman/{id}', [PeminjamanController::class, 'show'])->name('show.transaksipinjam');



});


Route::group(['middleware'=>['auth','HakAkses:pegawai']], function(){
    Route::get('/dashboardpegawai', [PegawaiController::class, 'dashboardpegawai'])->name('dashboardpegawai');
    Route::get('/pegawai/tampil/{id}',[PeminjamanController::class, 'tampilpeminjaman'])->name('tampilpeminjaman');
    Route::get('/pengaduan/tampil',[PengaduanController::class, 'tampilpengaduan'])->name('tampilpengaduan');
    Route::post('/simpanpeminjaman',[PeminjamanController::class, 'simpanpeminjaman'])->name('simpanpeminjaman');
    Route::get('/daftarpinjam',[PeminjamanController::class, 'daftarpinjam'])->name('daftarpinjam');
    //---------PEGAWAI------------
    Route::get('/pegawai/aset',[PegawaiController::class, 'daftaraset'])->name('daftaraset');
    //------PENGADUAN KERUSAKAN--------- PEGAWAI---
    Route::get('/pengaduan',[PengaduanController::class, 'pengaduan'])->name('pengaduan');
    Route::post('/insertpengaduan',[PengaduanController::class, 'insertpengaduan'])->name('insertpengaduan');
});


Route::group(['middleware'=>['auth','HakAkses:helpdesk,admin']], function(){
    Route::post('/updatepengaduan/{id}', [PengaduanController::class, 'complete'])->name('completeComplaint');
    Route::get('/dashboardhelpdesk', [PengaduanController::class, 'dashboardhelpdesk'])->name('dashboardhelpdesk');
    Route::get('/helpdesk', [PengaduanController::class, 'helpdesk'])->name('helpdesk');
});

//LOGIN ------------------------------------------------------------------------------------------------------------------------------------//

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/loginproses', [LoginController::class, 'loginproses'])->name('loginproses');
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/registeruser', [LoginController::class, 'registeruser'])->name('registeruser');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


//HELPDESK 
Route::get('/helpdesk/notifications', [PengaduanController::class, 'helpdesknotifications'])->name('helpdesk.notifications');

// GRAFIK 
Route::get('/grafik-peminjaman', [PeminjamanController::class, 'grafikPeminjaman'])->name('grafik.peminjaman');

Route::get('/adminpengaduan', [PengaduanController::class, 'adminpengaduan'])->name('adminpengaduan');
