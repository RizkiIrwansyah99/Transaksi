<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_dets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sales_id');
            $table->unsignedBigInteger('barang_id');
            $table->decimal('harga_bandrol');
            $table->integer('qty');
            $table->decimal('diskon_pct');
            $table->decimal('dison_nilai');
            $table->decimal('harga_diskon');
            $table->decimal('total');
            $table->timestamps();

            $table->foreign('sales_id')->references('id')->on('sales')->onDelete('cascade');
            $table->foreign('barang_id')->references('id')->on('barangs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales_dets');
    }
};
