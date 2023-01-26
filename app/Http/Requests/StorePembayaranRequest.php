<?php

namespace App\Http\Requests;

use App\Models\Pembayaran;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePembayaranRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pembayaran_create');
    }

    public function rules()
    {
        return [];
    }
}
