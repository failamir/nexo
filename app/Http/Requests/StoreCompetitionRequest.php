<?php

namespace App\Http\Requests;

use App\Models\Competition;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCompetitionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('competition_create');
    }

    public function rules()
    {
        return [
            'nama_lomba' => [
                'string',
                'nullable',
            ],
            'jumlah_submission' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'biaya' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'tanggal_mulai' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'tanggal_selesai' => [
                'string',
                'nullable',
            ],
        ];
    }
}
