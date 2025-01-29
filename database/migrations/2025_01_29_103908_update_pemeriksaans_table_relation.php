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
        Schema::table('pemeriksaans', function (Blueprint $table) {
        // Hapus kolom redundant
        $table->dropColumn(['no_rekam_medis', 'nama_pasien']);
        
        // Tambahkan foreign key
        $table->foreignId('pasien_id')
        ->after('id')
        ->constrained('pasiens')
        ->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pemeriksaans', function (Blueprint $table) {
        $table->dropForeign(['pasien_id']);
        $table->dropColumn('pasien_id');
        
        // Kembalikan kolom jika diperlukan
        $table->string('no_rekam_medis');
        $table->string('nama_pasien');
    });
    }
};
