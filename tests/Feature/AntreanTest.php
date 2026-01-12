<?php

namespace Tests\Feature;

use App\Models\Pasien;
use App\Models\Antrean;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AntreanTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_an_antrean()
    {
        $pasien = Pasien::create([
            'nosurat' => '123',
            'nama' => 'John Doe',
            'dob' => '1990-01-01',
            'jenis_kelamin' => 'Laki-laki',
            'jenis_pemeriksaan' => 'General',
            'sampling_time' => '2023-01-01 10:00:00',
            'nomor_pid' => 'P123',
            'nationality' => 'WNI',
            'result' => '-',
        ]);

        $antrean = Antrean::create([
            'pasien_id' => $pasien->id,
        ]);

        $this->assertDatabaseHas('antreans', [
            'id' => $antrean->id,
            'pasien_id' => $pasien->id,
        ]);
    }
}
