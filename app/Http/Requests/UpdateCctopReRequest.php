<?php

namespace App\Http\Requests;

use App\Models\CctopRe;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCctopReRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('cctop_re_edit');
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
