<?php

namespace App\Http\Requests;

use App\Models\Species;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSpeciesRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('species_create');
    }

    public function rules()
    {
        return [
            'code' => [
                'string',
                'max:10',
                'required',
            ],
            'kingdom' => [
                'string',
                'max:10',
                'required',
            ],
            'taxon' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'unique:species,taxon',
            ],
            'common_name' => [
                'string',
                'max:255',
                'required',
            ],
            'official_name' => [
                'string',
                'max:255',
                'required',
            ],
            'flag' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'sequences.*' => [
                'integer',
            ],
            'sequences' => [
                'required',
                'array',
            ],
        ];
    }
}
