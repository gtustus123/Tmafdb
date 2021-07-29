@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.referenceProteome.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.reference-proteomes.update", [$referenceProteome->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="species_id">{{ trans('cruds.referenceProteome.fields.species') }}</label>
                <select class="form-control select2 {{ $errors->has('species') ? 'is-invalid' : '' }}" name="species_id" id="species_id" required>
                    @foreach($species as $id => $entry)
                        <option value="{{ $id }}" {{ (old('species_id') ? old('species_id') : $referenceProteome->species->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('species'))
                    <div class="invalid-feedback">
                        {{ $errors->first('species') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.referenceProteome.fields.species_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="url">{{ trans('cruds.referenceProteome.fields.url') }}</label>
                <input class="form-control {{ $errors->has('url') ? 'is-invalid' : '' }}" type="text" name="url" id="url" value="{{ old('url', $referenceProteome->url) }}">
                @if($errors->has('url'))
                    <div class="invalid-feedback">
                        {{ $errors->first('url') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.referenceProteome.fields.url_helper') }}</span>
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