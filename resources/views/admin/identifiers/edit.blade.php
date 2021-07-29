@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.identifier.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.identifiers.update", [$identifier->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="database_id">{{ trans('cruds.identifier.fields.database') }}</label>
                <select class="form-control select2 {{ $errors->has('database') ? 'is-invalid' : '' }}" name="database_id" id="database_id" required>
                    @foreach($databases as $id => $entry)
                        <option value="{{ $id }}" {{ (old('database_id') ? old('database_id') : $identifier->database->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('database'))
                    <div class="invalid-feedback">
                        {{ $errors->first('database') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.identifier.fields.database_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sequence_id">{{ trans('cruds.identifier.fields.sequence') }}</label>
                <select class="form-control select2 {{ $errors->has('sequence') ? 'is-invalid' : '' }}" name="sequence_id" id="sequence_id" required>
                    @foreach($sequences as $id => $entry)
                        <option value="{{ $id }}" {{ (old('sequence_id') ? old('sequence_id') : $identifier->sequence->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('sequence'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sequence') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.identifier.fields.sequence_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="code">{{ trans('cruds.identifier.fields.code') }}</label>
                <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" name="code" id="code" value="{{ old('code', $identifier->code) }}" required>
                @if($errors->has('code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.identifier.fields.code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="flag">{{ trans('cruds.identifier.fields.flag') }}</label>
                <input class="form-control {{ $errors->has('flag') ? 'is-invalid' : '' }}" type="number" name="flag" id="flag" value="{{ old('flag', $identifier->flag) }}" step="1" required>
                @if($errors->has('flag'))
                    <div class="invalid-feedback">
                        {{ $errors->first('flag') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.identifier.fields.flag_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection