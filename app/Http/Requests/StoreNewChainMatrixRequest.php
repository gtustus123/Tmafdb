<?php

namespace App\Http\Requests;

use App\Models\NewChainMatrix;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreNewChainMatrixRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('new_chain_matrix_create');
    }

    public function rules()
    {
        return [
            'identifier_id' => [
                'required',
                'integer',
            ],
            'matrix' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'transformxx' => [
                'numeric',
                'required',
            ],
            'transformxy' => [
                'numeric',
                'required',
            ],
            'transformxz' => [
                'numeric',
                'required',
            ],
            'transformxt' => [
                'numeric',
                'required',
            ],
            'transformyx' => [
                'numeric',
                'required',
            ],
            'transformyy' => [
                'numeric',
                'required',
            ],
            'transformyz' => [
                'numeric',
                'required',
            ],
            'transformyt' => [
                'numeric',
                'required',
            ],
            'transformzx' => [
                'numeric',
                'required',
            ],
            'transformzy' => [
                'numeric',
                'required',
            ],
            'transformzz' => [
                'numeric',
                'required',
            ],
            'transformzt' => [
                'numeric',
                'required',
            ],
        ];
    }
}
