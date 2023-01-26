<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamCompetitionTimLombaPivotTable extends Migration
{
    public function up()
    {
        Schema::create('team_competition_tim_lomba', function (Blueprint $table) {
            $table->unsignedBigInteger('team_competition_id');
            $table->foreign('team_competition_id', 'team_competition_id_fk_7931139')->references('id')->on('team_competitions')->onDelete('cascade');
            $table->unsignedBigInteger('tim_lomba_id');
            $table->foreign('tim_lomba_id', 'tim_lomba_id_fk_7931139')->references('id')->on('tim_lombas')->onDelete('cascade');
        });
    }
}
