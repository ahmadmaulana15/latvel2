<?php

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

Route::get('/', function () {
    return view('welcome');
});
//insert model
use App\Mahasiswa;
use App\Dosen;
use App\Hobi;

//memilih data mahasiswa yang memiliki nim '0101137'
Route::get('relasi-1',function(){
    $mhs = Mahasiswa::where('nim','=','0101137')->first();

    //menampilkan data wali dari mahasiswa yang dipilih
    return $mhs->wali->nama;
});
Route::get('relasi-2',function(){
    $mhs = Mahasiswa::where('nim','=','0101137')->first();

    //menampilkan data wali dari mahasiswa yang dipilih
    return $mhs->dosen->nama;
});

Route::get('relasi-3',function(){
    $dosen = Dosen::where('nama','=','Abdul Mustofa')->first();

    foreach ($dosen->mahasiswa as $temp)
    echo '<li> Nama: '. $temp->nama .
         ' <strong>' . $temp->nim. '</strong></li>';
});
Route::get('relasi-4',function(){
     //mencari mahasiswa yang bernama dadang
    $dadang = Mahasiswa::where('nama','=','Dadang Peloy')->first();

    //menampilkan seluruh hobi dari dadang
    foreach ($dadang->hobi as $temp)
    echo '<li> Nama: '. $temp->hobi .'</li>';
});
Route::get('relasi-5',function(){
    //mencari mahasiswa yang mempunyai hobi Gaming
    $dota = Hobi::where('hobi','=','Game Mobile')->first();
    //menampilkan semua siswa yang mempunyai hobi game mobile
    foreach ($dota->mahasiswa as $temp)
    echo '<li> Nama: '. $temp->nama .
         ' <strong>' . $temp->nim. '</strong></li>';
});

Route::get('Relasi-join',function(){
    $sql = DB::table('mahasiswa')
    ->select('mahasiswas.nama','mahasiswas.nim','walis.nama as nama_wali')
    ->join('walis','walis.id_mahasiswa','=','mahasiswas.id')
    ->get();
    dd($sql);
});
Route::get('eloquement', function(){
    $mahasiswa = Mahasiswa::with('dosen','wali','hobi')->get();
    return view('eloquement',compact('mahasiswa'));
});

Route::get('relasi-join2',function(){
    $sql = DB::table('mahasiswa')
    ->select('mahasiswas.nama','mahasiswas.nim','walis.nama as nama_wali')
    ->join('walis','walis.id_mahasiswa','=','mahasiswas.id')
    ->get();
    dd($sql);
});
Route::get('lateloquement', function(){
    $mahasiswa = Mahasiswa::with('dosen','wali','hobi')->get()->take(1);
    return view('lateloquement',compact('mahasiswa'));
});
