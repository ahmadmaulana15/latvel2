<?php

use Illuminate\Database\Seeder;
use App\Dosen;
use App\Mahasiswa;
use App\Wali;
use App\Hobi;
class RelasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menghapus Semua sample Data

        DB::table('dosens')->delete();
        DB::table('mahasiswas')->delete();
        DB::table('walis')->delete();
        DB::table('hobis')->delete();
        DB::table('mahasiswa_hobi')->delete();
        //membuat data Dosen
        $dosen = Dosen::create([
            'nama' => 'Abdul Mustofa',
            'nipd' => '12345667890'
        ]);
        $this->command->info('Data Dosen Berhasil Dibuat');

        // Mmebuat data Mahasiswa
       $mamat = Mahasiswa::create([
           'nama' => 'Mamat Karbit',
           'nim' => '0101137',
           'id_dosen' =>$dosen->id
       ]);

       $dadang = Mahasiswa::create([
        'nama' => 'Dadang Peloy',
        'nim' => '010182372',
        'id_dosen' =>$dosen->id
    ]);

    $feri = Mahasiswa::create([
        'nama' => 'Feri Ambyar Supriadi',
        'nim' => '0103723',
        'id_dosen' =>$dosen->id
    ]);
    $this->command->info('Data Mahasiswa Berhasil Dibuat');
    // Membuat data Wali
    $ahmad = Wali::create([
        'nama' => 'Ahmad',
        'id_mahasiswa' =>$mamat->id
    ]);

    $basit = Wali::create([
        'nama' => 'Basit',
        'id_mahasiswa' =>$feri->id
    ]);
    $this->command->info('Data Wali Berhasil Dibuat');

    //membuat data hobi

    $mancing = Hobi::create([
        'hobi' => 'Mancing Keributan'
    ]);

    $gaming = Hobi::create([
        'hobi' => 'Game Mobile'
    ]);

    $mengaji = Hobi::create([
        'hobi' => 'Mengaji Al-quran'
    ]);

    //menampilkan Hobi Ke Mahasiswa

    $mamat ->hobi()->attach($mancing->id);
    $mamat ->hobi()->attach($mengaji->id);
    $dadang ->hobi()->attach($gaming->id);
    $feri ->hobi()->attach($mengaji->id);
    $this->command->info('Data Hobi Berhasil Dibuat');

}
}
