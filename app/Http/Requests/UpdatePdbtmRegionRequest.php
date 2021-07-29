<?php

namespace App\Http\Requests;

use App\Models\PdbtmRegion;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePdbtmRegionRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pdbtm_region_edit');
    }

    public function rules()
    {
        return [
            'region_id' => [
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
