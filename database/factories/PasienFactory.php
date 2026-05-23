<?php

namespace Database\Factories;

use App\Models\Pasien;
use Illuminate\Database\Eloquent\Factories\Factory;

class PasienFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pasien::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nosurat' => $this->faker->numerify('UC/EX/####'),
            'nama' => $this->faker->name(),
            'dob' => $this->faker->date('Y-m-d'),
            'jenis_kelamin' => $this->faker->randomElement(['Male', 'Female']),
            'jenis_pemeriksaan' => $this->faker->randomElement(['Swab Antigen', 'PCR']),
            'sampling_time' => $this->faker->dateTime()->format('Y-m-d H:i:s'),
            'nomor_pid' => $this->faker->unique()->numerify('PID#####'),
            'nationality' => $this->faker->country(),
            'result' => $this->faker->randomElement(['Negative', 'Positive']),
        ];
    }
}
