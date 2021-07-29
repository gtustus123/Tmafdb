<?php

namespace App\Http\Requests;

use App\Models\NewChainMatrix;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyNewChainMatrixRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('new_chain_matrix_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:new_chain_matrices,id',
        ];
    }
}
