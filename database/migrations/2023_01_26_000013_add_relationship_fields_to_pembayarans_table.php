<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPembayaransTable extends Migration
{
    public function up()
    {
        Schema::table('pembayarans', function (Blueprint $table) {
            $table->unsignedBigInteger('ketua_id')->nullable();
            $table->foreign('ketua_id', 'ketua_fk_7931131')->references('id')->on('users');
            $table->unsignedBigInteger('competition_id')->nullable();
            $table->foreign('competition_id', 'competition_fk_7931132')->references('id')->on('competitions');
        });
    }
}
