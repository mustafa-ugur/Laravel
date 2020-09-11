<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Slayt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slayt', function (Blueprint $table) {
            $table->id();
            $table->string('baslik', 255)->nullable();
            $table->string('ozet', 255)->nullable();
            $table->text('link')->nullable();
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
        Schema::dropIfExists('slayt');
    }
}
