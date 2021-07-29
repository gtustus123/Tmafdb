<?php

namespace App\Http\Requests;

use App\Models\UniprotAc;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUniprotAcRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('uniprot_ac_create');
    }

    public function rules()
    {
        return [
            'identifier_id' => [
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
