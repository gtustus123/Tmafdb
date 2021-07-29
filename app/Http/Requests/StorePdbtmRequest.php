<?php

namespace App\Http\Requests;

use App\Models\Pdbtm;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePdbtmRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pdbtm_create');
    }

    public function rules()
    {
        return [
            'matrix' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'transmembrane' => [
                'required',
            ],
            'qvalue' => [
                'numeric',
                'required',
            ],
            'tmtype' => [
                'required',
            ],
            'x' => [
                'numeric',
                'required',
            ],
            'y' => [
                'numeric',
                'required',
            ],
            'z' => [
                'numeric',
                'required',
            ],
            'xx' => [
                'numeric',
                'required',
            ],
            'xy' => [
                'numeric',
                'required',
            ],
            'xz' => [
                'numeric',
                'required',
            ],
            'xt' => [
                'numeric',
                'required',
            ],
            'yx' => [
                'numeric',
                'required',
            ],
            'yy' => [
                'numeric',
                'required',
            ],
            'yz' => [
                'numeric',
                'required',
            ],
            'yt' => [
                'numeric',
                'required',
            ],
            'zx' => [
                'numeric',
                'required',
            ],
            'zy' => [
                'numeric',
                'required',
            ],
            'zz' => [
                'numeric',
                'required',
            ],
            'zt' => [
                'numeric',
                'required',
            ],
        ];
    }
}
