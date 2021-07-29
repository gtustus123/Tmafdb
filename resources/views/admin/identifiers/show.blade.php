@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.identifier.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.identifiers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.identifier.fields.id') }}
                        </th>
                        <td>
                            {{ $identifier->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.identifier.fields.database') }}
                        </th>
                        <td>
                            {{ $identifier->database->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.identifier.fields.sequence') }}
                        </th>
                        <td>
                            {{ $identifier->sequence->hash ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.identifier.fields.code') }}
                        </th>
                        <td>
                            {{ $identifier->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.identifier.fields.flag') }}
                        </th>
                        <td>
                            {{ $identifier->flag }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.identifiers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection