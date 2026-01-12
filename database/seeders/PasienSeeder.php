<?php

namespace Database\Seeders;

use App\Models\Pasien;
use Illuminate\Database\Seeder;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pasien::firstOrCreate(
            ['nomor_pid' => 'PID001'],
            [
                'nosurat' => 'NS001',
                'nama' => 'Test Patient',
                'dob' => '1990-01-15',
                'jenis_kelamin' => 'Laki-Laki',
                'jenis_pemeriksaan' => 'General',
                'sampling_time' => now(),
                'nationality' => 'Indonesia',
                'result' => 'Pending',
            ]
        );
    }
}
