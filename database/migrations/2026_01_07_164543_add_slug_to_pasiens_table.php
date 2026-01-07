<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pasiens', function (Blueprint $table) {
            $table->string('slug')->unique()->nullable()->after('nama');
        });

        // Generate slugs for existing records
        $pasiens = \App\Models\Pasien::all();
        foreach ($pasiens as $pasien) {
            $pasien->slug = Str::slug($pasien->nama . '-' . $pasien->nomor_pid);
            $pasien->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pasiens', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
