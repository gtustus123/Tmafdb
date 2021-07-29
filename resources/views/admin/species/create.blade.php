@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.species.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.species.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="code">{{ trans('cruds.species.fields.code') }}</label>
                <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" name="code" id="code" value="{{ old('code', '') }}" required>
                @if($errors->has('code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.species.fields.code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="kingdom">{{ trans('cruds.species.fields.kingdom') }}</label>
                <input class="form-control {{ $errors->has('kingdom') ? 'is-invalid' : '' }}" type="text" name="kingdom" id="kingdom" value="{{ old('kingdom', '') }}" required>
                @if($errors->has('kingdom'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kingdom') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.species.fields.kingdom_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="taxon">{{ trans('cruds.species.fields.taxon') }}</label>
                <input class="form-control {{ $errors->has('taxon') ? 'is-invalid' : '' }}" type="number" name="taxon" id="taxon" value="{{ old('taxon', '') }}" step="1" required>
                @if($errors->has('taxon'))
                    <div class="invalid-feedback">
                        {{ $errors->first('taxon') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.species.fields.taxon_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="common_name">{{ trans('cruds.species.fields.common_name') }}</label>
                <input class="form-control {{ $errors->has('common_name') ? 'is-invalid' : '' }}" type="text" name="common_name" id="common_name" value="{{ old('common_name', '') }}" required>
                @if($errors->has('common_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('common_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.species.fields.common_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="official_name">{{ trans('cruds.species.fields.official_name') }}</label>
                <input class="form-control {{ $errors->has('official_name') ? 'is-invalid' : '' }}" type="text" name="official_name" id="official_name" value="{{ old('official_name', '') }}" required>
                @if($errors->has('official_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('official_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.species.fields.official_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="flag">{{ trans('cruds.species.fields.flag') }}</label>
                <input class="form-control {{ $errors->has('flag') ? 'is-invalid' : '' }}" type="number" name="flag" id="flag" value="{{ old('flag', '0') }}" step="1" required>
                @if($errors->has('flag'))
                    <div class="invalid-feedback">
                        {{ $errors->first('flag') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.species.fields.flag_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sequences">{{ trans('cruds.species.fields.sequences') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('sequences') ? 'is-invalid' : '' }}" name="sequences[]" id="sequences" multiple required>
                    @foreach($sequences as $id => $sequences)
                        <option value="{{ $id }}" {{ in_array($id, old('sequences', [])) ? 'selected' : '' }}>{{ $sequences }}</option>
                    @endforeach
                </select>
                @if($errors->has('sequences'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sequences') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.species.fields.sequences_helper') }}</span>
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