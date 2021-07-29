@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.region.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.regions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="identifier_id">{{ trans('cruds.region.fields.identifier') }}</label>
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
                <span class="help-block">{{ trans('cruds.region.fields.identifier_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="localisation_type_id">{{ trans('cruds.region.fields.localisation_type') }}</label>
                <select class="form-control select2 {{ $errors->has('localisation_type') ? 'is-invalid' : '' }}" name="localisation_type_id" id="localisation_type_id" required>
                    @foreach($localisation_types as $id => $entry)
                        <option value="{{ $id }}" {{ old('localisation_type_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('localisation_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('localisation_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.region.fields.localisation_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="region_source_id">{{ trans('cruds.region.fields.region_source') }}</label>
                <select class="form-control select2 {{ $errors->has('region_source') ? 'is-invalid' : '' }}" name="region_source_id" id="region_source_id" required>
                    @foreach($region_sources as $id => $entry)
                        <option value="{{ $id }}" {{ old('region_source_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('region_source'))
                    <div class="invalid-feedback">
                        {{ $errors->first('region_source') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.region.fields.region_source_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="start">{{ trans('cruds.region.fields.start') }}</label>
                <input class="form-control {{ $errors->has('start') ? 'is-invalid' : '' }}" type="number" name="start" id="start" value="{{ old('start', '1') }}" step="1" required>
                @if($errors->has('start'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.region.fields.start_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="end">{{ trans('cruds.region.fields.end') }}</label>
                <input class="form-control {{ $errors->has('end') ? 'is-invalid' : '' }}" type="number" name="end" id="end" value="{{ old('end', '1') }}" step="1" required>
                @if($errors->has('end'))
                    <div class="invalid-feedback">
                        {{ $errors->first('end') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.region.fields.end_helper') }}</span>
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