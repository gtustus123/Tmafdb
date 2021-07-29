<?php

namespace App\Http\Requests;

use App\Models\LocalisationType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreLocalisationTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('localisation_type_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'max:20',
                'required',
                'unique:localisation_types',
            ],
            'code' => [
                'string',
                'min:1',
                'max:1',
                'required',
            ],
            'description' => [
                'required',
            ],
        ];
    }
}
