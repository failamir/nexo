<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetitionsTable extends Migration
{
    public function up()
    {
        Schema::create('competitions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_lomba')->nullable();
            $table->string('category')->nullable();
            $table->integer('jumlah_submission')->nullable();
            $table->integer('biaya')->nullable();
            $table->datetime('tanggal_mulai')->nullable();
            $table->string('tanggal_selesai')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
