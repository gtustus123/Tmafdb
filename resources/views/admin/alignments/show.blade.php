@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.alignment.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.alignments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.alignment.fields.id') }}
                        </th>
                        <td>
                            {{ $alignment->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.alignment.fields.seq_1') }}
                        </th>
                        <td>
                            {{ $alignment->seq_1->hash ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.alignment.fields.seq_2') }}
                        </th>
                        <td>
                            {{ $alignment->seq_2->hash ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.alignment.fields.alignment') }}
                        </th>
                        <td>
                            {{ $alignment->alignment }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.alignment.fields.identity') }}
                        </th>
                        <td>
                            {{ $alignment->identity }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.alignment.fields.pair') }}
                        </th>
                        <td>
                            {{ $alignment->pair }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.alignment.fields.gap_1') }}
                        </th>
                        <td>
                            {{ $alignment->gap_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.alignment.fields.gap_2') }}
                        </th>
                        <td>
                            {{ $alignment->gap_2 }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.alignments.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection