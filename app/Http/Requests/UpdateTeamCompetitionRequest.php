<?php

namespace App\Http\Requests;

use App\Models\TeamCompetition;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTeamCompetitionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('team_competition_edit');
    }

    public function rules()
    {
        return [
            'tims.*' => [
                'integer',
            ],
            'tims' => [
                'array',
            ],
            'competitions.*' => [
                'integer',
            ],
            'competitions' => [
                'array',
            ],
        ];
    }
}
