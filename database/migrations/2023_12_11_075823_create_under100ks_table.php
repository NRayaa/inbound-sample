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
        Schema::create('under100ks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tag_warna_id')->constrained('tag_warnas');
            $table->foreignId('diskon_id')->constrained('diskons');
            $table->string('no_resi_lama');
            $table->string('no_resi_baru');
            $table->string('nama_barang');
            $table->integer('qty');
            $table->decimal('harga_lama', 10, 2);
            $table->decimal('harga_baru', 10, 2);
            $table->enum('kualitas_check', ['lolos', 'rusak', 'discrepancy', 'abnormal', 'tk']);
            // $table->string('sub_kategory'); //ambil nama aja dari diskon
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('under100ks');
    }
};
