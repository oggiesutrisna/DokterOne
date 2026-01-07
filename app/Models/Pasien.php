<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pasien extends Model
{
    use HasFactory;

    protected $fillable = [
        'nosurat',
        'nama',
        'slug',
        'dob',
        'jenis_kelamin',
        'jenis_pemeriksaan',
        'sampling_time',
        'nomor_pid',
        'nationality',
        'result',
    ];

    /**
     * Get the route key for the model.
     * This makes Laravel use 'slug' instead of 'id' for route model binding.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Boot the model and register events.
     */
    protected static function boot()
    {
        parent::boot();

        // Auto-generate slug when creating a new pasien
        static::creating(function ($pasien) {
            $pasien->slug = static::generateUniqueSlug($pasien->nama, $pasien->nomor_pid);
        });

        // Update slug when updating nama or nomor_pid
        static::updating(function ($pasien) {
            if ($pasien->isDirty('nama') || $pasien->isDirty('nomor_pid')) {
                $pasien->slug = static::generateUniqueSlug($pasien->nama, $pasien->nomor_pid, $pasien->id);
            }
        });
    }

    /**
     * Generate a unique slug.
     */
    protected static function generateUniqueSlug($nama, $nomor_pid, $excludeId = null)
    {
        $baseSlug = Str::slug($nama . '-' . $nomor_pid);
        $slug = $baseSlug;
        $counter = 1;

        $query = static::where('slug', $slug);
        if ($excludeId) {
            $query->where('id', '!=', $excludeId);
        }

        while ($query->exists()) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
            $query = static::where('slug', $slug);
            if ($excludeId) {
                $query->where('id', '!=', $excludeId);
            }
        }

        return $slug;
    }
}
