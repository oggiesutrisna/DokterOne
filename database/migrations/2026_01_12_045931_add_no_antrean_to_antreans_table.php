<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('antreans', function (Blueprint $table) {
            $table->integer('no_antrean')->nullable()->after('pasien_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('antreans', function (Blueprint $table) {
            $table->dropColumn('no_antrean');
        });
    }
};
