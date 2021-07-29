@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.cctopRe.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.cctop-res.update", [$cctopRe->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="identifier_id">{{ trans('cruds.cctopRe.fields.identifier') }}</label>
                <select class="form-control select2 {{ $errors->has('identifier') ? 'is-invalid' : '' }}" name="identifier_id" id="identifier_id" required>
                    @foreach($identifiers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('identifier_id') ? old('identifier_id') : $cctopRe->identifier->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('identifier'))
                    <div class="invalid-feedback">
                        {{ $errors->first('identifier') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cctopRe.fields.identifier_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="reliability">{{ trans('cruds.cctopRe.fields.reliability') }}</label>
                <input class="form-control {{ $errors->has('reliability') ? 'is-invalid' : '' }}" type="number" name="reliability" id="reliability" value="{{ old('reliability', $cctopRe->reliability) }}" step="0.01" required>
                @if($errors->has('reliability'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reliability') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.cctopRe.fields.reliability_helper') }}</span>
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