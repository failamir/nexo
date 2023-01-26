<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTeamCompetitionsTable extends Migration
{
    public function up()
    {
        Schema::table('team_competitions', function (Blueprint $table) {
            $table->unsignedBigInteger('pembayaran_id')->nullable();
            $table->foreign('pembayaran_id', 'pembayaran_fk_7931141')->references('id')->on('pembayarans');
        });
    }
}
