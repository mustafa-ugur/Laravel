<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Urunler extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urunler', function (Blueprint $table) {
            $table->id();
            $table->string('baslik', 255)->nullable();
            $table->string('kod', 255)->nullable();
            $table->string('marka', 255)->nullable();
            $table->integer('stok')->nullable();
            $table->integer('kid')->nullable();
            $table->integer('ana_fiyat')->nullable();
            $table->integer('satis_fiyat')->nullable();
            $table->text('aciklama')->nullable();
            $table->text('ozet')->nullable();
            $table->text('resim')->nullable();
            $table->timestamps();
            $table->timestamps('silinme_tarihi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('urunler');
    }
}
