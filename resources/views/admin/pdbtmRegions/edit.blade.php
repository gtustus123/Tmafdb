@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.pdbtmRegion.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.pdbtm-regions.update", [$pdbtmRegion->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="region_id">{{ trans('cruds.pdbtmRegion.fields.region') }}</label>
                <select class="form-control select2 {{ $errors->has('region') ? 'is-invalid' : '' }}" name="region_id" id="region_id" required>
                    @foreach($regions as $id => $entry)
                        <option value="{{ $id }}" {{ (old('region_id') ? old('region_id') : $pdbtmRegion->region->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('region'))
                    <div class="invalid-feedback">
                        {{ $errors->first('region') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pdbtmRegion.fields.region_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="start">{{ trans('cruds.pdbtmRegion.fields.start') }}</label>
                <input class="form-control {{ $errors->has('start') ? 'is-invalid' : '' }}" type="number" name="start" id="start" value="{{ old('start', $pdbtmRegion->start) }}" step="1" required>
                @if($errors->has('start'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pdbtmRegion.fields.start_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="end">{{ trans('cruds.pdbtmRegion.fields.end') }}</label>
                <input class="form-control {{ $errors->has('end') ? 'is-invalid' : '' }}" type="number" name="end" id="end" value="{{ old('end', $pdbtmRegion->end) }}" step="1" required>
                @if($errors->has('end'))
                    <div class="invalid-feedback">
                        {{ $errors->first('end') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pdbtmRegion.fields.end_helper') }}</span>
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