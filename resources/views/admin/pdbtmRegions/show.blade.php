@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.pdbtmRegion.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pdbtm-regions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.pdbtmRegion.fields.id') }}
                        </th>
                        <td>
                            {{ $pdbtmRegion->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pdbtmRegion.fields.region') }}
                        </th>
                        <td>
                            {{ $pdbtmRegion->region->start ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pdbtmRegion.fields.start') }}
                        </th>
                        <td>
                            {{ $pdbtmRegion->start }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pdbtmRegion.fields.end') }}
                        </th>
                        <td>
                            {{ $pdbtmRegion->end }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pdbtm-regions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection