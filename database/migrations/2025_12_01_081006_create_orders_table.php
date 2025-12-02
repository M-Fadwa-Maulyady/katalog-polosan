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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('produk_id')
                ->constrained('products')
                ->onDelete('cascade');

            $table->string('nama_penerima');
            $table->string('alamat');
            $table->string('telepon');

            $table->string('bukti')->nullable(); // bukti pembayaran

            $table->integer('total');
            $table->string('status')->default('proses');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
