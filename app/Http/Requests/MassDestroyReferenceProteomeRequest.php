<?php

namespace App\Http\Requests;

use App\Models\ReferenceProteome;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyReferenceProteomeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('reference_proteome_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:reference_proteomes,id',
        ];
    }
}
