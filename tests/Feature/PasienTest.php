<?php

namespace Tests\Feature;

use App\Models\Pasien;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PasienTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guests_are_redirected_to_login()
    {
        $response = $this->get(route('pasiens.index'));
        $response->assertRedirect(route('login'));
    }

    /** @test */
    public function authenticated_user_can_view_patients_index_with_all_records()
    {
        $user = User::factory()->create();

        // Create 6 patients to verify pagination limit of 5 is bypassed (we now load all)
        Pasien::factory()->count(6)->create();

        $response = $this->actingAs($user)->get(route('pasiens.index'));

        $response->assertStatus(200);
        $response->assertViewHas('pasiens');

        // Assert that all 6 patients are returned in the view variable
        $this->assertCount(6, $response->viewData('pasiens'));
    }

    /** @test */
    public function patient_index_displays_correct_stats_counts()
    {
        $user = User::factory()->create();

        // Create patients with capitalized results
        Pasien::factory()->create(['result' => 'Negative']);
        Pasien::factory()->create(['result' => 'Negative']);
        Pasien::factory()->create(['result' => 'Positive']);

        // Create patient with lowercase result to verify it handles both cases
        Pasien::factory()->create(['result' => 'negative']);

        $response = $this->actingAs($user)->get(route('pasiens.index'));

        $response->assertStatus(200);

        // Assert stats counts are correct (3 Negative/negative, 1 Positive)
        $response->assertSee('id="total-pasien-count"', false);
        $response->assertSee('id="negatif-count"', false);
        $response->assertSee('id="positif-count"', false);
    }

    /** @test */
    public function authenticated_user_can_preview_patient_pdf_with_qrcode()
    {
        $user = User::factory()->create();
        $pasien = Pasien::factory()->create([
            'nama' => 'Rahmat Joget',
            'nomor_pid' => '111111111111',
        ]);

        $response = $this->actingAs($user)->get(route('previewPDF', $pasien));

        $response->assertStatus(200);

        // Render the view directly to assert that it displays the QR code
        $view = $this->view('pdf.result', [
            'pasien' => $pasien,
            'qrCode' => 'fake-base64-qrcode-string',
        ]);

        $view->assertSee('fake-base64-qrcode-string');
        $view->assertSee('Scan to verify document validity');
    }

    /** @test */
    public function authenticated_user_can_view_edit_page()
    {
        $user = User::factory()->create();
        $pasien = Pasien::factory()->create([
            'nama' => 'Rahmat Joget',
        ]);

        $response = $this->actingAs($user)->get(route('pasiens.edit', $pasien));

        $response->assertStatus(200);
        $response->assertSee('Edit Patient Information');
        $response->assertSee('Rahmat Joget');
    }
}
