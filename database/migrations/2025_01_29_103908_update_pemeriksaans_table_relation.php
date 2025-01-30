<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pemeriksaans', function (Blueprint $table) {
            // Hapus kolom hanya jika ada
            if (Schema::hasColumn('pemeriksaans', 'no_rekam_medis')) {
                $table->dropColumn('no_rekam_medis');
            }
            
            if (Schema::hasColumn('pemeriksaans', 'nama_pasien')) {
                $table->dropColumn('nama_pasien');
            }

            // Tambahkan foreign key dengan pengecekan
            if (!Schema::hasColumn('pemeriksaans', 'pasien_id')) {
                $table->foreignId('pasien_id')
                    ->after('id')
                    ->constrained('pasiens')
                    ->onDelete('cascade');
            }
        });
    }

    public function down(): void
    {
        Schema::table('pemeriksaans', function (Blueprint $table) {
            // Hapus foreign key jika ada
            $table->dropForeign(['pasien_id']);
            $table->dropColumn('pasien_id');

            // Tambahkan kembali kolom yang dihapus
            if (!Schema::hasColumn('pemeriksaans', 'no_rekam_medis')) {
                $table->string('no_rekam_medis');
            }
            
            if (!Schema::hasColumn('pemeriksaans', 'nama_pasien')) {
                $table->string('nama_pasien');
            }
        });
    }
};