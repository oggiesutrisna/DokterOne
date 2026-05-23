<?php

namespace Tests\Feature;

use App\Models\Absensi;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AbsensiTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_an_absensi()
    {
        $user = User::factory()->create();

        $absensi = Absensi::create([
            'user_id' => $user->id,
            'tanggal' => now(),
            'status' => 'hadir',
        ]);

        $this->assertDatabaseHas('absensis', [
            'id' => $absensi->id,
            'user_id' => $user->id,
            'status' => 'hadir',
        ]);
    }
}
