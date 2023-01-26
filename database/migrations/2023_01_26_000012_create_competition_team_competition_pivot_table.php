<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompetitionTeamCompetitionPivotTable extends Migration
{
    public function up()
    {
        Schema::create('competition_team_competition', function (Blueprint $table) {
            $table->unsignedBigInteger('team_competition_id');
            $table->foreign('team_competition_id', 'team_competition_id_fk_7931140')->references('id')->on('team_competitions')->onDelete('cascade');
            $table->unsignedBigInteger('competition_id');
            $table->foreign('competition_id', 'competition_id_fk_7931140')->references('id')->on('competitions')->onDelete('cascade');
        });
    }
}
