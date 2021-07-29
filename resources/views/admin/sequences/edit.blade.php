@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.sequence.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.sequences.update", [$sequence->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="seq">{{ trans('cruds.sequence.fields.seq') }}</label>
                <textarea class="form-control {{ $errors->has('seq') ? 'is-invalid' : '' }}" name="seq" id="seq" required>{{ old('seq', $sequence->seq) }}</textarea>
                @if($errors->has('seq'))
                    <div class="invalid-feedback">
                        {{ $errors->first('seq') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sequence.fields.seq_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="hash">{{ trans('cruds.sequence.fields.hash') }}</label>
                <input class="form-control {{ $errors->has('hash') ? 'is-invalid' : '' }}" type="text" name="hash" id="hash" value="{{ old('hash', $sequence->hash) }}" required>
                @if($errors->has('hash'))
                    <div class="invalid-feedback">
                        {{ $errors->first('hash') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sequence.fields.hash_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="length">{{ trans('cruds.sequence.fields.length') }}</label>
                <input class="form-control {{ $errors->has('length') ? 'is-invalid' : '' }}" type="number" name="length" id="length" value="{{ old('length', $sequence->length) }}" step="1" required>
                @if($errors->has('length'))
                    <div class="invalid-feedback">
                        {{ $errors->first('length') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sequence.fields.length_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="flag">{{ trans('cruds.sequence.fields.flag') }}</label>
                <input class="form-control {{ $errors->has('flag') ? 'is-invalid' : '' }}" type="number" name="flag" id="flag" value="{{ old('flag', $sequence->flag) }}" step="1" required>
                @if($errors->has('flag'))
                    <div class="invalid-feedback">
                        {{ $errors->first('flag') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.sequence.fields.flag_helper') }}</span>
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