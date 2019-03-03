<?php

use Illuminate\Database\Seeder;

class Usertableseed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //users
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin',
            'password' => bcrypt('1'),
            'avatarname' => "avatars/png/bee.png",
            'level' => '9',
        ]);

        DB::table('users')->insert([
            'name' => 'yudi',
            'email' => 'yudi',
            'password' => bcrypt('1'),
            'avatarname' => "avatars/png/bird.png",
            'level' => '1',
        ]);

        DB::table('users')->insert([
            'name' => 'statistisi 1',
            'email' => 'statis',
            'password' => bcrypt('1'),
            'avatarname' => "avatars/png/lion.png",
            'level' => '1',
        ]);

        DB::table('users')->insert([
            'name' => 'penilai 1',
            'email' => 'penilai1',
            'password' => bcrypt('1'),
            'avatarname' => "avatars/png/panda.png",
            'level' => '4',
        ]);

        DB::table('users')->insert([
            'name' => 'penilai 2',
            'email' => 'penilai2',
            'password' => bcrypt('1'),
            'avatarname' => "avatars/png/giraffe.png",
            'level' => '4',
        ]);
        
        //arsip
        DB::table('marsip')->insert([
            'userid'=> '1',
            'email' => 'admin',
            'judul' => 'Judul Arsip',
            'ringkasan' => 'Ringkasan Arsip',
            'file' => 'down.pdf',
            'linkdownload' => 'files/1549433858-arsip.pdf',
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        //pengumuman
        DB::table('mpengumuman')->insert([
            'userid' => '1',
            'email'  => 'admin',
            'judulpengumuman' => 'Judul Pengumuman',
            'ringkasanpengumuman' => 'Ringkasan Pengumuman',
            'file' => 'down.pdf',
            'linkdownload' => 'files/2549433858-pengumuman.pdf',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //Ruang Diskusi
        DB::table('mruangdiskusi')->insert([
            'userid' => '1',
            'email'  => 'admin',
            'judulruangdiskusi' => 'Judul Ruang Diskusi',
            'ringkasanruangdiskusi' => 'Ringkasan Ruang Diskusi',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        //Penilaian
        DB::table('penilaian')->insert([
            'nama_pejabat_fungsional' => 'statistisi 1',
            'periode_dupak' => '2',
            'tahun' => '2018',
            'tgl_terima_tu' => '2019-02-21',
            'petugas_terima_tu' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
