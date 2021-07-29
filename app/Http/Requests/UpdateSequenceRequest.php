<?php

namespace App\Http\Requests;

use App\Models\Sequence;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateSequenceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sequence_edit');
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
                'unique:sequences,hash,' . request()->route('sequence')->id,
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
