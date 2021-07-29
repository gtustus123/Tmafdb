<?php

namespace App\Http\Requests;

use App\Models\Identifier;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateIdentifierRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('identifier_edit');
    }

    public function rules()
    {
        return [
            'database_id' => [
                'required',
                'integer',
            ],
            'sequence_id' => [
                'required',
                'integer',
            ],
            'code' => [
                'string',
                'max:30',
                'required',
            ],
            'flag' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
