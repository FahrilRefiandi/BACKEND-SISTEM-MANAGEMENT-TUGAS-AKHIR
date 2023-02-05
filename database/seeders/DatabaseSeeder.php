<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \DB::table('users')->insert([
            'no_identitas' => "1203210093",
            'username' => 'fahril',
            'password' => 'password',
            'role' => 'mahasiswa',
            'updated_at'=>now(),
            'created_at'=>now(),
        ]);

        \DB::table('users')->insert([
            'no_identitas' => "1203210092",
            'username' => 'aysar',
            'password' => 'password',
            'role' => 'mahasiswa',
            'updated_at'=>now(),
            'created_at'=>now(),
        ]);

        \DB::table('users')->insert([
            'no_identitas' => "1234567890",
            'username' => 'dosen',
            'password' => 'password',
            'role' => 'dosen',
            'updated_at'=>now(),
            'created_at'=>now(),
        ]);

        \DB::table('users')->insert([
            'no_identitas' => "12345",
            'username' => 'admin',
            'password' => 'password',
            'role' => 'admin',
            'updated_at'=>now(),
            'created_at'=>now(),
        ]);


        \DB::table('mahasiswa')->insert([
            'user_id' => "1",
            'dosen_pembina_id' => '1',
            'nama' => 'Fahril Refiandi',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'Jl. Cikini Raya No. 1',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '2002-01-01',
            'no_tlpn' => '081234567890',
            'prodi' => 'Informatika',
            'tahun_masuk' => '2020',
            'updated_at'=>now(),
            'created_at'=>now(),
        ]);

        \DB::table('mahasiswa')->insert([
            'user_id' => "2",
            'dosen_pembina_id' => '1',
            'nama' => 'Aysar Fadilah',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'Jl. Asem Baris No. 1',
            'tempat_lahir' => 'Surabaya',
            'tanggal_lahir' => '2002-02-02',
            'no_tlpn' => '081234567891',
            'prodi' => 'Informatika',
            'tahun_masuk' => '2020',
            'updated_at'=>now(),
            'created_at'=>now(),
        ]);

        \DB::table('dosen')->insert([
            'user_id' => "3",
            'nama' => 'Agus Supriyanto',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'Jl. Cikini Raya No. 1',
            'tempat_lahir' => 'Jakarta',
            'tanggal_lahir' => '2002-01-01',
            'no_tlpn' => '081234567898',
            'prodi' => 'Informatika',
            'tahun_masuk' => '2020',
            'updated_at'=>now(),
            'created_at'=>now(),
        ]);

        \DB::table('jadwal_bimbingan')->insert([
            'mahasiswa_id' => "1",
            'dosen_id' => "1",
            'keterangan' => 'Bimbingan 1',
            'tempat_bimbingan' => 'Ruangan Dosen',
            'tipe_bimbingan' => 'offline',
            'waktu_bimbingan' => '2023-02-01 10:00:00',
            'updated_at'=>now(),
            'created_at'=>now(),
        ]);


        \DB::table('bidang_ta')->insert([
            'bidang' => "Website",
            'updated_at'=>now(),
            'created_at'=>now(),
        ]);
        \DB::table('bidang_ta')->insert([
            'bidang' => "Application Desktop",
            'updated_at'=>now(),
            'created_at'=>now(),
        ]);
        \DB::table('bidang_ta')->insert([
            'bidang' => "Application Mobile",
            'updated_at'=>now(),
            'created_at'=>now(),
        ]);
        \DB::table('bidang_ta')->insert([
            'bidang' => "Artificial Intelligence",
            'updated_at'=>now(),
            'created_at'=>now(),
        ]);



    }
}
