@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.pdbtm.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pdbtms.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.pdbtm.fields.id') }}
                        </th>
                        <td>
                            {{ $pdbtm->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pdbtm.fields.matrix') }}
                        </th>
                        <td>
                            {{ $pdbtm->matrix }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pdbtm.fields.transmembrane') }}
                        </th>
                        <td>
                            {{ App\Models\Pdbtm::TRANSMEMBRANE_SELECT[$pdbtm->transmembrane] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pdbtm.fields.qvalue') }}
                        </th>
                        <td>
                            {{ $pdbtm->qvalue }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pdbtm.fields.tmtype') }}
                        </th>
                        <td>
                            {{ App\Models\Pdbtm::TMTYPE_SELECT[$pdbtm->tmtype] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pdbtm.fields.x') }}
                        </th>
                        <td>
                            {{ $pdbtm->x }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pdbtm.fields.y') }}
                        </th>
                        <td>
                            {{ $pdbtm->y }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pdbtm.fields.z') }}
                        </th>
                        <td>
                            {{ $pdbtm->z }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pdbtm.fields.xx') }}
                        </th>
                        <td>
                            {{ $pdbtm->xx }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pdbtm.fields.xy') }}
                        </th>
                        <td>
                            {{ $pdbtm->xy }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pdbtm.fields.xz') }}
                        </th>
                        <td>
                            {{ $pdbtm->xz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pdbtm.fields.xt') }}
                        </th>
                        <td>
                            {{ $pdbtm->xt }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pdbtm.fields.yx') }}
                        </th>
                        <td>
                            {{ $pdbtm->yx }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pdbtm.fields.yy') }}
                        </th>
                        <td>
                            {{ $pdbtm->yy }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pdbtm.fields.yz') }}
                        </th>
                        <td>
                            {{ $pdbtm->yz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pdbtm.fields.yt') }}
                        </th>
                        <td>
                            {{ $pdbtm->yt }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pdbtm.fields.zx') }}
                        </th>
                        <td>
                            {{ $pdbtm->zx }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pdbtm.fields.zy') }}
                        </th>
                        <td>
                            {{ $pdbtm->zy }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pdbtm.fields.zz') }}
                        </th>
                        <td>
                            {{ $pdbtm->zz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pdbtm.fields.zt') }}
                        </th>
                        <td>
                            {{ $pdbtm->zt }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pdbtms.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection