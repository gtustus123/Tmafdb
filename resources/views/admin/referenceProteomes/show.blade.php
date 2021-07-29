@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.referenceProteome.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.reference-proteomes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.referenceProteome.fields.id') }}
                        </th>
                        <td>
                            {{ $referenceProteome->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.referenceProteome.fields.species') }}
                        </th>
                        <td>
                            {{ $referenceProteome->species->common_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.referenceProteome.fields.url') }}
                        </th>
                        <td>
                            {{ $referenceProteome->url }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.reference-proteomes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection