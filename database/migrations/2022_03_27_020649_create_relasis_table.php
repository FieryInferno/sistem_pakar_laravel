<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up()
  {
    Schema::create('relasi', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('penyakit_id');
      $table->string('gejala');
      $table->foreign('penyakit_id')->references('id')->on('penyakit');
      $table->timestamps();
    });
  }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relasis');
    }
};
