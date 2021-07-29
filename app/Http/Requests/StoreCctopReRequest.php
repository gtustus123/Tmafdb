<?php

namespace App\Http\Requests;

use App\Models\CctopRe;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCctopReRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('cctop_re_create');
    }

    public function rules()
    {
        return [
            'identifier_id' => [
                'required',
                'integer',
            ],
            'reliability' => [
                'numeric',
                'required',
            ],
        ];
    }
}
