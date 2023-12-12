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
        Schema::create('diskons', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->unique();
            $table->integer('diskon');
            // $table->integer('fashion')->nullable();
            // $table->integer('otomotif')->nullable();
            // $table->integer('toys_hobbies_a')->nullable();
            // $table->integer('art')->nullable();
            // $table->integer('toys_hobbies_b')->nullable();
            // $table->integer('others_fmcg')->nullable();
            // $table->integer('elektronic_art')->nullable();
            // $table->integer('mainan_hv')->nullable();
            // $table->integer('perlengkapan_bayi')->nullable();
            // $table->integer('beauty')->nullable();
            // $table->integer('electronic_hv')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diskons');
    }
};
