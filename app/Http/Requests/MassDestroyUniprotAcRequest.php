<?php

namespace App\Http\Requests;

use App\Models\UniprotAc;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyUniprotAcRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('uniprot_ac_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:uniprot_acs,id',
        ];
    }
}
