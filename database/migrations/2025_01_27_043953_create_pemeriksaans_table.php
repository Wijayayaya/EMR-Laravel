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
            $table->string('no_rekam_medis');
            $table->string('dokter');
            $table->decimal('berat_badan', 5, 2); // dalam kg
            $table->string('tekanan_darah'); // format sistolik/diastolik
            $table->decimal('suhu_tubuh', 5, 2); // dalam °C
            $table->text('keluhan_pasien')->nullable();
            $table->string('nama_pasien');
            $table->date('tanggal_kunjungan');
            $table->decimal('tinggi_badan', 5, 2); // dalam cm
            $table->integer('detak_jantung'); // dalam bpm
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
