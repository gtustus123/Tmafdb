@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.newChainMatrix.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.new-chain-matrices.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.newChainMatrix.fields.id') }}
                        </th>
                        <td>
                            {{ $newChainMatrix->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newChainMatrix.fields.identifier') }}
                        </th>
                        <td>
                            {{ $newChainMatrix->identifier->code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newChainMatrix.fields.matrix') }}
                        </th>
                        <td>
                            {{ $newChainMatrix->matrix }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newChainMatrix.fields.transformxx') }}
                        </th>
                        <td>
                            {{ $newChainMatrix->transformxx }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newChainMatrix.fields.transformxy') }}
                        </th>
                        <td>
                            {{ $newChainMatrix->transformxy }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newChainMatrix.fields.transformxz') }}
                        </th>
                        <td>
                            {{ $newChainMatrix->transformxz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newChainMatrix.fields.transformxt') }}
                        </th>
                        <td>
                            {{ $newChainMatrix->transformxt }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newChainMatrix.fields.transformyx') }}
                        </th>
                        <td>
                            {{ $newChainMatrix->transformyx }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newChainMatrix.fields.transformyy') }}
                        </th>
                        <td>
                            {{ $newChainMatrix->transformyy }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newChainMatrix.fields.transformyz') }}
                        </th>
                        <td>
                            {{ $newChainMatrix->transformyz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newChainMatrix.fields.transformyt') }}
                        </th>
                        <td>
                            {{ $newChainMatrix->transformyt }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newChainMatrix.fields.transformzx') }}
                        </th>
                        <td>
                            {{ $newChainMatrix->transformzx }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newChainMatrix.fields.transformzy') }}
                        </th>
                        <td>
                            {{ $newChainMatrix->transformzy }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newChainMatrix.fields.transformzz') }}
                        </th>
                        <td>
                            {{ $newChainMatrix->transformzz }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newChainMatrix.fields.transformzt') }}
                        </th>
                        <td>
                            {{ $newChainMatrix->transformzt }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.new-chain-matrices.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection