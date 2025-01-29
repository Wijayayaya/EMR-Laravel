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
        Schema::create('pemeriksaans', function (Blueprint $table) {
        $table->id();
        $table->foreignId('pasien_id')->constrained('pasiens')->onDelete('cascade');
        $table->string('dokter');
        $table->decimal('berat_badan', 5, 2);
        $table->string('tekanan_darah');
        $table->decimal('suhu_tubuh', 5, 2);
        $table->text('keluhan_pasien')->nullable();
        $table->date('tanggal_kunjungan');
        $table->decimal('tinggi_badan', 5, 2);
        $table->integer('detak_jantung');
        $table->text('riwayat_penyakit')->nullable();
        $table->text('diagnosis')->nullable();
        $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeriksaans');
    }
};
