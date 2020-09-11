<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Sayfa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sayfa', function (Blueprint $table) {
            $table->id();
            $table->string('baslik', 255)->nullable();
            $table->text('ozet')->nullable();
            $table->text('aciklama')->nullable();
            $table->text('resim')->nullable();
            $table->timestamps();
            $table->timestamp('silinme_tarihi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sayfa');
    }
}
