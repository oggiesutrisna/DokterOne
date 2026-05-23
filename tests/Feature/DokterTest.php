<?php

namespace Tests\Feature;

use App\Models\Dokter;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DokterTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_dokter()
    {
        $dokter = Dokter::create([
            'nama' => 'Dr. Stranger',
        ]);

        $this->assertDatabaseHas('dokters', [
            'id' => $dokter->id,
            'nama' => 'Dr. Stranger',
        ]);
    }
}
