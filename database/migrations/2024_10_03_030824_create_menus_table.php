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
        Schema::create('menus', function (Blueprint $table) {
            $table->id('id_menu');
            $table->string('gambar_menu');
            $table->string('nama_menu');
            $table->text('detail_menu');
            $table->bigInteger('harga');
            $table->integer('stok')->default(0);
            $table->unsignedBigInteger('id_kategori'); // Menyatakan bahwa kolom tersebut akan menyimpan angka besar (big integer) yang tidak bisa negatif (unsigned).
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
