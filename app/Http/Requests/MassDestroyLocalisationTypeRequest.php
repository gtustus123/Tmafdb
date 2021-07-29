<?php

namespace App\Http\Requests;

use App\Models\LocalisationType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyLocalisationTypeRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('localisation_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:localisation_types,id',
        ];
    }
}
