<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTimLombasTable extends Migration
{
    public function up()
    {
        Schema::table('tim_lombas', function (Blueprint $table) {
            $table->unsignedBigInteger('ketua_id')->nullable();
            $table->foreign('ketua_id', 'ketua_fk_7931149')->references('id')->on('users');
        });
    }
}
