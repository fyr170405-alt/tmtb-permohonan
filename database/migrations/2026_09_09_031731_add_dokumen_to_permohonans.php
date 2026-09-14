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
        Schema::table('permohonans', function (Blueprint $table) {
            $table->string('dokumen_path')->nullable()->after('alamat_lengkap');
            $table->text('catatan_admin')->nullable()->after('dokumen_path');
            $table->string('approved_by')->nullable()->after('catatan_admin');
            $table->timestamp('approved_at')->nullable()->after('approved_by');
        });
    }

    public function down(): void
    {
        Schema::table('permohonans', function (Blueprint $table) {
            $table->dropColumn(['dokumen_path','catatan_admin','approved_by','approved_at']);
        });
    }
};
