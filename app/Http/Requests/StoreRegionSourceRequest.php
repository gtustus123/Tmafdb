<?php

namespace App\Http\Requests;

use App\Models\RegionSource;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRegionSourceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('region_source_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'max:20',
                'required',
                'unique:region_sources',
            ],
            'description' => [
                'required',
            ],
        ];
    }
}
