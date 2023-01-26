<?php

namespace App\Http\Requests;

use App\Models\TimLomba;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTimLombaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('tim_lomba_edit');
    }

    public function rules()
    {
        return [
            'nama_tim' => [
                'string',
                'nullable',
            ],
            'institusi' => [
                'string',
                'nullable',
            ],
            'nomor_kontak_1' => [
                'string',
                'nullable',
            ],
            'nomor_kontak_2' => [
                'string',
                'nullable',
            ],
            'nama_anggota_1' => [
                'string',
                'nullable',
            ],
            'nama_anggota_2' => [
                'string',
                'nullable',
            ],
            'nama_anggota_3' => [
                'string',
                'nullable',
            ],
            'nama_anggota_4' => [
                'string',
                'nullable',
            ],
            'email_anggota_4' => [
                'string',
                'nullable',
            ],
            'simpan_permanen' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
