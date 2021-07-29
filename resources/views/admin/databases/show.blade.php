@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.database.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.databases.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.database.fields.id') }}
                        </th>
                        <td>
                            {{ $database->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.database.fields.name') }}
                        </th>
                        <td>
                            {{ $database->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.database.fields.description') }}
                        </th>
                        <td>
                            {{ $database->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.database.fields.url') }}
                        </th>
                        <td>
                            {{ $database->url }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.database.fields.local_path') }}
                        </th>
                        <td>
                            {{ $database->local_path }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.databases.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection