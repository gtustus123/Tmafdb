@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.cctopRe.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cctop-res.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.cctopRe.fields.id') }}
                        </th>
                        <td>
                            {{ $cctopRe->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cctopRe.fields.identifier') }}
                        </th>
                        <td>
                            {{ $cctopRe->identifier->code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cctopRe.fields.reliability') }}
                        </th>
                        <td>
                            {{ $cctopRe->reliability }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cctop-res.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection