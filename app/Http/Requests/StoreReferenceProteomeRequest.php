<?php

namespace App\Http\Requests;

use App\Models\ReferenceProteome;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreReferenceProteomeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('reference_proteome_create');
    }

    public function rules()
    {
        return [
            'species_id' => [
                'required',
                'integer',
            ],
            'url' => [
                'string',
                'max:255',
                'nullable',
            ],
        ];
    }
}
