@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.species.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.species.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.species.fields.id') }}
                        </th>
                        <td>
                            {{ $species->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.species.fields.code') }}
                        </th>
                        <td>
                            {{ $species->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.species.fields.kingdom') }}
                        </th>
                        <td>
                            {{ $species->kingdom }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.species.fields.taxon') }}
                        </th>
                        <td>
                            {{ $species->taxon }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.species.fields.common_name') }}
                        </th>
                        <td>
                            {{ $species->common_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.species.fields.official_name') }}
                        </th>
                        <td>
                            {{ $species->official_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.species.fields.flag') }}
                        </th>
                        <td>
                            {{ $species->flag }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.species.fields.sequences') }}
                        </th>
                        <td>
                            @foreach($species->sequences as $key => $sequences)
                                <span class="label label-info">{{ $sequences->hash }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.species.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection