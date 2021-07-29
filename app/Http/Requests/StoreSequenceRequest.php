<?php

namespace App\Http\Requests;

use App\Models\Sequence;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSequenceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sequence_create');
    }

    public function rules()
    {
        return [
            'seq' => [
                'required',
            ],
            'hash' => [
                'string',
                'max:40',
                'required',
                'unique:sequences',
            ],
            'length' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
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
