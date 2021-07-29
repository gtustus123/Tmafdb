@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.uniprotAc.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.uniprot-acs.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="identifier_id">{{ trans('cruds.uniprotAc.fields.identifier') }}</label>
                <select class="form-control select2 {{ $errors->has('identifier') ? 'is-invalid' : '' }}" name="identifier_id" id="identifier_id" required>
                    @foreach($identifiers as $id => $entry)
                        <option value="{{ $id }}" {{ old('identifier_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('identifier'))
                    <div class="invalid-feedback">
                        {{ $errors->first('identifier') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.uniprotAc.fields.identifier_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="code">{{ trans('cruds.uniprotAc.fields.code') }}</label>
                <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" name="code" id="code" value="{{ old('code', '') }}" required>
                @if($errors->has('code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.uniprotAc.fields.code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="flag">{{ trans('cruds.uniprotAc.fields.flag') }}</label>
                <input class="form-control {{ $errors->has('flag') ? 'is-invalid' : '' }}" type="number" name="flag" id="flag" value="{{ old('flag', '0') }}" step="1" required>
                @if($errors->has('flag'))
                    <div class="invalid-feedback">
                        {{ $errors->first('flag') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.uniprotAc.fields.flag_helper') }}</span>
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