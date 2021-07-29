@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.alignment.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.alignments.update", [$alignment->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="seq_1_id">{{ trans('cruds.alignment.fields.seq_1') }}</label>
                <select class="form-control select2 {{ $errors->has('seq_1') ? 'is-invalid' : '' }}" name="seq_1_id" id="seq_1_id" required>
                    @foreach($seq_1s as $id => $entry)
                        <option value="{{ $id }}" {{ (old('seq_1_id') ? old('seq_1_id') : $alignment->seq_1->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('seq_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('seq_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.alignment.fields.seq_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="seq_2_id">{{ trans('cruds.alignment.fields.seq_2') }}</label>
                <select class="form-control select2 {{ $errors->has('seq_2') ? 'is-invalid' : '' }}" name="seq_2_id" id="seq_2_id" required>
                    @foreach($seq_2s as $id => $entry)
                        <option value="{{ $id }}" {{ (old('seq_2_id') ? old('seq_2_id') : $alignment->seq_2->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('seq_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('seq_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.alignment.fields.seq_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="alignment">{{ trans('cruds.alignment.fields.alignment') }}</label>
                <textarea class="form-control {{ $errors->has('alignment') ? 'is-invalid' : '' }}" name="alignment" id="alignment" required>{{ old('alignment', $alignment->alignment) }}</textarea>
                @if($errors->has('alignment'))
                    <div class="invalid-feedback">
                        {{ $errors->first('alignment') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.alignment.fields.alignment_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="identity">{{ trans('cruds.alignment.fields.identity') }}</label>
                <input class="form-control {{ $errors->has('identity') ? 'is-invalid' : '' }}" type="number" name="identity" id="identity" value="{{ old('identity', $alignment->identity) }}" step="1" required>
                @if($errors->has('identity'))
                    <div class="invalid-feedback">
                        {{ $errors->first('identity') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.alignment.fields.identity_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="pair">{{ trans('cruds.alignment.fields.pair') }}</label>
                <input class="form-control {{ $errors->has('pair') ? 'is-invalid' : '' }}" type="number" name="pair" id="pair" value="{{ old('pair', $alignment->pair) }}" step="1" required>
                @if($errors->has('pair'))
                    <div class="invalid-feedback">
                        {{ $errors->first('pair') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.alignment.fields.pair_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="gap_1">{{ trans('cruds.alignment.fields.gap_1') }}</label>
                <input class="form-control {{ $errors->has('gap_1') ? 'is-invalid' : '' }}" type="number" name="gap_1" id="gap_1" value="{{ old('gap_1', $alignment->gap_1) }}" step="1" required>
                @if($errors->has('gap_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gap_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.alignment.fields.gap_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="gap_2">{{ trans('cruds.alignment.fields.gap_2') }}</label>
                <input class="form-control {{ $errors->has('gap_2') ? 'is-invalid' : '' }}" type="number" name="gap_2" id="gap_2" value="{{ old('gap_2', $alignment->gap_2) }}" step="1" required>
                @if($errors->has('gap_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('gap_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.alignment.fields.gap_2_helper') }}</span>
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