<?php

namespace Tests\Feature;

use App\Models\Perawat;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PerawatTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_perawat()
    {
        $perawat = Perawat::create([
            'nama' => 'Nurse Joy',
        ]);

        $this->assertDatabaseHas('perawats', [
            'id' => $perawat->id,
            'nama' => 'Nurse Joy',
        ]);
    }
}
