<?php

namespace App\Http\Requests;

use App\Models\TimLomba;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyTimLombaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('tim_lomba_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:tim_lombas,id',
        ];
    }
}
