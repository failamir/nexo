<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeamCompetitionRequest;
use App\Http\Requests\UpdateTeamCompetitionRequest;
use App\Http\Resources\Admin\TeamCompetitionResource;
use App\Models\TeamCompetition;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TeamCompetitionApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('team_competition_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TeamCompetitionResource(TeamCompetition::with(['tims', 'competitions'])->get());
    }

    public function store(StoreTeamCompetitionRequest $request)
    {
        $teamCompetition = TeamCompetition::create($request->all());
        $teamCompetition->tims()->sync($request->input('tims', []));
        $teamCompetition->competitions()->sync($request->input('competitions', []));

        return (new TeamCompetitionResource($teamCompetition))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(TeamCompetition $teamCompetition)
    {
        abort_if(Gate::denies('team_competition_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TeamCompetitionResource($teamCompetition->load(['tims', 'competitions']));
    }

    public function update(UpdateTeamCompetitionRequest $request, TeamCompetition $teamCompetition)
    {
        $teamCompetition->update($request->all());
        $teamCompetition->tims()->sync($request->input('tims', []));
        $teamCompetition->competitions()->sync($request->input('competitions', []));

        return (new TeamCompetitionResource($teamCompetition))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(TeamCompetition $teamCompetition)
    {
        abort_if(Gate::denies('team_competition_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teamCompetition->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
