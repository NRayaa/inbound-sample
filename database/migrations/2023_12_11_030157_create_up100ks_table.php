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
        Schema::create('up100ks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('diskon_id')->constrained('diskons');
            $table->string('no_resi_lama');
            $table->string('no_resi_baru')->unique();
            $table->integer('qty');
            $table->string('nama_barang');
            $table->decimal('harga_lama', 10, 2);
            $table->decimal('harga_baru', 10, 2);
            $table->enum('kualitas_check', ['lolos', 'rusak', 'discrepancy', 'abnormal', 'tk']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('up100ks');
    }
};
