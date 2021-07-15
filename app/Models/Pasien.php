<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $fillable = [
        'nosurat',
        'nama',
        'dob',
        'jenis_kelamin',
        'jenis_pemeriksaan',
        'sampling_time',
        'nomor_pid',
        'nationality',
        'result',
    ];

    use HasFactory;
}
