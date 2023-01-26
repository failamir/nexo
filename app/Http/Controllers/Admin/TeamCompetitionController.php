<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTeamCompetitionRequest;
use App\Http\Requests\StoreTeamCompetitionRequest;
use App\Http\Requests\UpdateTeamCompetitionRequest;
use App\Models\Competition;
use App\Models\Pembayaran;
use App\Models\TeamCompetition;
use App\Models\TimLomba;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TeamCompetitionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('team_competition_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teamCompetitions = TeamCompetition::with(['tims', 'competitions', 'pembayaran'])->get();

        return view('admin.teamCompetitions.index', compact('teamCompetitions'));
    }

    public function create()
    {
        abort_if(Gate::denies('team_competition_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tims = TimLomba::pluck('nama_tim', 'id');

        $competitions = Competition::pluck('nama_lomba', 'id');

        $pembayarans = Pembayaran::pluck('status_pembayaran', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.teamCompetitions.create', compact('competitions', 'pembayarans', 'tims'));
    }

    public function store(StoreTeamCompetitionRequest $request)
    {
        $teamCompetition = TeamCompetition::create($request->all());
        $teamCompetition->tims()->sync($request->input('tims', []));
        $teamCompetition->competitions()->sync($request->input('competitions', []));

        return redirect()->route('admin.team-competitions.index');
    }

    public function edit(TeamCompetition $teamCompetition)
    {
        abort_if(Gate::denies('team_competition_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tims = TimLomba::pluck('nama_tim', 'id');

        $competitions = Competition::pluck('nama_lomba', 'id');

        $pembayarans = Pembayaran::pluck('status_pembayaran', 'id')->prepend(trans('global.pleaseSelect'), '');

        $teamCompetition->load('tims', 'competitions', 'pembayaran');

        return view('admin.teamCompetitions.edit', compact('competitions', 'pembayarans', 'teamCompetition', 'tims'));
    }

    public function update(UpdateTeamCompetitionRequest $request, TeamCompetition $teamCompetition)
    {
        $teamCompetition->update($request->all());
        $teamCompetition->tims()->sync($request->input('tims', []));
        $teamCompetition->competitions()->sync($request->input('competitions', []));

        return redirect()->route('admin.team-competitions.index');
    }

    public function show(TeamCompetition $teamCompetition)
    {
        abort_if(Gate::denies('team_competition_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teamCompetition->load('tims', 'competitions', 'pembayaran');

        return view('admin.teamCompetitions.show', compact('teamCompetition'));
    }

    public function destroy(TeamCompetition $teamCompetition)
    {
        abort_if(Gate::denies('team_competition_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $teamCompetition->delete();

        return back();
    }

    public function massDestroy(MassDestroyTeamCompetitionRequest $request)
    {
        TeamCompetition::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
