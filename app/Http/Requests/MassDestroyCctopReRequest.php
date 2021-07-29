<?php

namespace App\Http\Requests;

use App\Models\CctopRe;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCctopReRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('cctop_re_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:cctop_res,id',
        ];
    }
}
