<?php

namespace App\Http\Requests;

use App\Models\TeamCompetition;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTeamCompetitionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('team_competition_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:team_competitions,id',
        ];
    }
}
