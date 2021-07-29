<?php

namespace App\Http\Requests;

use App\Models\Alignment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAlignmentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('alignment_edit');
    }

    public function rules()
    {
        return [
            'seq_1_id' => [
                'required',
                'integer',
            ],
            'seq_2_id' => [
                'required',
                'integer',
            ],
            'alignment' => [
                'required',
            ],
            'identity' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'pair' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'gap_1' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'gap_2' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
