<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimLombasTable extends Migration
{
    public function up()
    {
        Schema::create('tim_lombas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_tim')->nullable();
            $table->string('institusi')->nullable();
            $table->string('nomor_kontak_1')->nullable();
            $table->string('nomor_kontak_2')->nullable();
            $table->string('nama_anggota_1')->nullable();
            $table->string('email_anggota_1')->nullable();
            $table->string('nama_anggota_2')->nullable();
            $table->string('email_anggota_2')->nullable();
            $table->string('nama_anggota_3')->nullable();
            $table->string('email_anggota_3')->nullable();
            $table->string('nama_anggota_4')->nullable();
            $table->string('email_anggota_4')->nullable();
            $table->integer('simpan_permanen')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
