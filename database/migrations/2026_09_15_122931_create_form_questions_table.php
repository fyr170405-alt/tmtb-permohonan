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
        Schema::create('form_questions', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('step')->comment('1-4 wizard step');
            $table->string('label');
            $table->string('field_name');
            $table->string('field_type')->default('text')->comment('text,number,textarea,select,date');
            $table->text('options')->nullable()->comment('pisah koma untuk select');
            $table->string('placeholder')->nullable();
            $table->boolean('is_required')->default(false);
            $table->boolean('is_active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
        Schema::table('permohonans', function (Blueprint $table) {
            $table->json('extra_answers')->nullable()->after('dokumen_path');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('permohonans', function (Blueprint $table) {
            $table->dropColumn('extra_answers');
        });
        Schema::dropIfExists('form_questions');
    }
};
