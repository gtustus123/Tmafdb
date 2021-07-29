@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.sequence.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sequences.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.sequence.fields.id') }}
                        </th>
                        <td>
                            {{ $sequence->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sequence.fields.seq') }}
                        </th>
                        <td>
                            {{ $sequence->seq }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sequence.fields.hash') }}
                        </th>
                        <td>
                            {{ $sequence->hash }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sequence.fields.length') }}
                        </th>
                        <td>
                            {{ $sequence->length }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.sequence.fields.flag') }}
                        </th>
                        <td>
                            {{ $sequence->flag }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.sequences.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#sequences_species" role="tab" data-toggle="tab">
                {{ trans('cruds.species.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="sequences_species">
            @includeIf('admin.sequences.relationships.sequencesSpecies', ['species' => $sequence->sequencesSpecies])
        </div>
    </div>
</div>

@endsection