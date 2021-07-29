@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.localisationType.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.localisation-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.localisationType.fields.id') }}
                        </th>
                        <td>
                            {{ $localisationType->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.localisationType.fields.name') }}
                        </th>
                        <td>
                            {{ $localisationType->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.localisationType.fields.code') }}
                        </th>
                        <td>
                            {{ $localisationType->code }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.localisation-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection