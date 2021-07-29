@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.uniprotAc.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.uniprot-acs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.uniprotAc.fields.id') }}
                        </th>
                        <td>
                            {{ $uniprotAc->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.uniprotAc.fields.identifier') }}
                        </th>
                        <td>
                            {{ $uniprotAc->identifier->code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.uniprotAc.fields.code') }}
                        </th>
                        <td>
                            {{ $uniprotAc->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.uniprotAc.fields.flag') }}
                        </th>
                        <td>
                            {{ $uniprotAc->flag }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.uniprot-acs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection