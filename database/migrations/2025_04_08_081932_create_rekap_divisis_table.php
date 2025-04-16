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
        Schema::create('rekap_divisis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('divisi_id')->constrained()->onDelete('cascade');
            // $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->integer('ots_masuk');
            $table->integer('ots_selesai');
            $table->integer('ots_sisa');
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekap_divisis');
    }
};
