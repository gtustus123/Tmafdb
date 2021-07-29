<?php

namespace App\Http\Requests;

use App\Models\PdbtmRegion;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyPdbtmRegionRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('pdbtm_region_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:pdbtm_regions,id',
        ];
    }
}
