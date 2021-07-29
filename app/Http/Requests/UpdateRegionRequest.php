<?php

namespace App\Http\Requests;

use App\Models\Region;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRegionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('region_edit');
    }

    public function rules()
    {
        return [
            'identifier_id' => [
                'required',
                'integer',
            ],
            'localisation_type_id' => [
                'required',
                'integer',
            ],
            'region_source_id' => [
                'required',
                'integer',
            ],
            'start' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'end' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
