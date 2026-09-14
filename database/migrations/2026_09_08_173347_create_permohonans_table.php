<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permohonans', function (Blueprint $table) {
            $table->id();
            $table->string('tahun')->default('1448/1449')->nullable();
            $table->string('username')->nullable()->default('00007');
            $table->string('pjgt_nama')->nullable();
            $table->string('pjgt_id')->nullable(); // ID PJGT like 00195

            // Step 1 - Identitas Madrasah
            $table->string('nama_madrasah')->nullable();
            $table->string('nama_pesantren')->nullable();
            $table->string('negara')->default('INDONESIA');
            $table->string('provinsi')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('desa')->nullable();
            $table->string('jalan_dusun')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('telepon')->nullable();
            $table->string('email')->nullable();

            // Step 2 - Data Pengelola Lembaga
            $table->string('pengasuh')->nullable();
            $table->string('pengasuh_hp')->nullable();
            $table->string('ketua_yayasan')->nullable();
            $table->string('ketua_yayasan_hp')->nullable();
            $table->string('sekretaris_yayasan')->nullable();
            $table->string('sekretaris_yayasan_hp')->nullable();
            $table->string('kepala_madrasah')->nullable();
            $table->string('kepala_madrasah_hp')->nullable();
            $table->string('tata_usaha')->nullable();
            $table->string('tata_usaha_hp')->nullable();
            $table->string('pjgt')->nullable();
            $table->string('pjgt_hp')->nullable();

            // Step 3 - Situasi dan Kondisi Madrasah
            $table->string('situasi_madrasah')->nullable(); // PESANTREN
            $table->string('komunikasi_bahasa')->nullable();
            $table->string('komunikasi_lainnya')->nullable();
            $table->string('mapel_aqidah')->nullable();
            $table->string('mapel_fiqh')->nullable();
            $table->string('mapel_ilmu_alat')->nullable();
            $table->string('mapel_quran')->nullable();
            $table->string('mapel_akhlaq')->nullable();
            $table->string('kbm_bahasa')->nullable();
            $table->string('kbm_lainnya')->nullable();
            $table->string('guru_laki')->nullable();
            $table->string('guru_perempuan')->nullable();

            // Step 4 - Jumlah Murid
            $table->integer('sifir_putra')->nullable();
            $table->integer('sifir_putri')->nullable();
            // Ibtidaiyah 1-6
            $table->integer('ibtidaiyah_1_putra')->nullable();
            $table->integer('ibtidaiyah_1_putri')->nullable();
            $table->integer('ibtidaiyah_2_putra')->nullable();
            $table->integer('ibtidaiyah_2_putri')->nullable();
            $table->integer('ibtidaiyah_3_putra')->nullable();
            $table->integer('ibtidaiyah_3_putri')->nullable();
            $table->integer('ibtidaiyah_4_putra')->nullable();
            $table->integer('ibtidaiyah_4_putri')->nullable();
            $table->integer('ibtidaiyah_5_putra')->nullable();
            $table->integer('ibtidaiyah_5_putri')->nullable();
            $table->integer('ibtidaiyah_6_putra')->nullable();
            $table->integer('ibtidaiyah_6_putri')->nullable();
            // Tsanawiyah 1-3
            $table->integer('tsanawiyah_1_putra')->nullable();
            $table->integer('tsanawiyah_1_putri')->nullable();
            $table->integer('tsanawiyah_2_putra')->nullable();
            $table->integer('tsanawiyah_2_putri')->nullable();
            $table->integer('tsanawiyah_3_putra')->nullable();
            $table->integer('tsanawiyah_3_putri')->nullable();
            // Santri Mukim
            $table->integer('mukim_putra')->nullable();
            $table->integer('mukim_putri')->nullable();
            $table->integer('tidak_mukim_putra')->nullable();
            $table->integer('tidak_mukim_putri')->nullable();

            // Step 5 / Permohonan Lama fields
            $table->string('wil')->default('T-4');
            $table->string('status')->default('Ditolak'); // Ditolak, Diterima, Proses
            $table->integer('butuh_gt')->default(1);
            $table->string('rapot')->nullable()->default('A');
            $table->string('alamat_lengkap')->nullable(); // computed

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('permohonans');
    }
};
