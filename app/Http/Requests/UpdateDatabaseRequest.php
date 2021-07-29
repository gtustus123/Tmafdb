<?php

namespace App\Http\Requests;

use App\Models\Database;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateDatabaseRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('database_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'min:3',
                'max:45',
                'required',
                'unique:databases,name,' . request()->route('database')->id,
            ],
            'description' => [
                'required',
            ],
            'url' => [
                'string',
                'max:255',
                'required',
            ],
            'local_path' => [
                'required',
            ],
        ];
    }
}
