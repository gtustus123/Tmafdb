@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.newChainMatrix.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.new-chain-matrices.update", [$newChainMatrix->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="identifier_id">{{ trans('cruds.newChainMatrix.fields.identifier') }}</label>
                <select class="form-control select2 {{ $errors->has('identifier') ? 'is-invalid' : '' }}" name="identifier_id" id="identifier_id" required>
                    @foreach($identifiers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('identifier_id') ? old('identifier_id') : $newChainMatrix->identifier->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('identifier'))
                    <div class="invalid-feedback">
                        {{ $errors->first('identifier') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.newChainMatrix.fields.identifier_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="matrix">{{ trans('cruds.newChainMatrix.fields.matrix') }}</label>
                <input class="form-control {{ $errors->has('matrix') ? 'is-invalid' : '' }}" type="number" name="matrix" id="matrix" value="{{ old('matrix', $newChainMatrix->matrix) }}" step="1" required>
                @if($errors->has('matrix'))
                    <div class="invalid-feedback">
                        {{ $errors->first('matrix') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.newChainMatrix.fields.matrix_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="transformxx">{{ trans('cruds.newChainMatrix.fields.transformxx') }}</label>
                <input class="form-control {{ $errors->has('transformxx') ? 'is-invalid' : '' }}" type="number" name="transformxx" id="transformxx" value="{{ old('transformxx', $newChainMatrix->transformxx) }}" step="0.00000001" required>
                @if($errors->has('transformxx'))
                    <div class="invalid-feedback">
                        {{ $errors->first('transformxx') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.newChainMatrix.fields.transformxx_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="transformxy">{{ trans('cruds.newChainMatrix.fields.transformxy') }}</label>
                <input class="form-control {{ $errors->has('transformxy') ? 'is-invalid' : '' }}" type="number" name="transformxy" id="transformxy" value="{{ old('transformxy', $newChainMatrix->transformxy) }}" step="0.00000001" required>
                @if($errors->has('transformxy'))
                    <div class="invalid-feedback">
                        {{ $errors->first('transformxy') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.newChainMatrix.fields.transformxy_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="transformxz">{{ trans('cruds.newChainMatrix.fields.transformxz') }}</label>
                <input class="form-control {{ $errors->has('transformxz') ? 'is-invalid' : '' }}" type="number" name="transformxz" id="transformxz" value="{{ old('transformxz', $newChainMatrix->transformxz) }}" step="0.00000001" required>
                @if($errors->has('transformxz'))
                    <div class="invalid-feedback">
                        {{ $errors->first('transformxz') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.newChainMatrix.fields.transformxz_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="transformxt">{{ trans('cruds.newChainMatrix.fields.transformxt') }}</label>
                <input class="form-control {{ $errors->has('transformxt') ? 'is-invalid' : '' }}" type="number" name="transformxt" id="transformxt" value="{{ old('transformxt', $newChainMatrix->transformxt) }}" step="0.00000001" required>
                @if($errors->has('transformxt'))
                    <div class="invalid-feedback">
                        {{ $errors->first('transformxt') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.newChainMatrix.fields.transformxt_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="transformyx">{{ trans('cruds.newChainMatrix.fields.transformyx') }}</label>
                <input class="form-control {{ $errors->has('transformyx') ? 'is-invalid' : '' }}" type="number" name="transformyx" id="transformyx" value="{{ old('transformyx', $newChainMatrix->transformyx) }}" step="0.00000001" required>
                @if($errors->has('transformyx'))
                    <div class="invalid-feedback">
                        {{ $errors->first('transformyx') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.newChainMatrix.fields.transformyx_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="transformyy">{{ trans('cruds.newChainMatrix.fields.transformyy') }}</label>
                <input class="form-control {{ $errors->has('transformyy') ? 'is-invalid' : '' }}" type="number" name="transformyy" id="transformyy" value="{{ old('transformyy', $newChainMatrix->transformyy) }}" step="0.01" required>
                @if($errors->has('transformyy'))
                    <div class="invalid-feedback">
                        {{ $errors->first('transformyy') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.newChainMatrix.fields.transformyy_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="transformyz">{{ trans('cruds.newChainMatrix.fields.transformyz') }}</label>
                <input class="form-control {{ $errors->has('transformyz') ? 'is-invalid' : '' }}" type="number" name="transformyz" id="transformyz" value="{{ old('transformyz', $newChainMatrix->transformyz) }}" step="0.00000001" required>
                @if($errors->has('transformyz'))
                    <div class="invalid-feedback">
                        {{ $errors->first('transformyz') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.newChainMatrix.fields.transformyz_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="transformyt">{{ trans('cruds.newChainMatrix.fields.transformyt') }}</label>
                <input class="form-control {{ $errors->has('transformyt') ? 'is-invalid' : '' }}" type="number" name="transformyt" id="transformyt" value="{{ old('transformyt', $newChainMatrix->transformyt) }}" step="0.00000001" required>
                @if($errors->has('transformyt'))
                    <div class="invalid-feedback">
                        {{ $errors->first('transformyt') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.newChainMatrix.fields.transformyt_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="transformzx">{{ trans('cruds.newChainMatrix.fields.transformzx') }}</label>
                <input class="form-control {{ $errors->has('transformzx') ? 'is-invalid' : '' }}" type="number" name="transformzx" id="transformzx" value="{{ old('transformzx', $newChainMatrix->transformzx) }}" step="0.00000001" required>
                @if($errors->has('transformzx'))
                    <div class="invalid-feedback">
                        {{ $errors->first('transformzx') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.newChainMatrix.fields.transformzx_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="transformzy">{{ trans('cruds.newChainMatrix.fields.transformzy') }}</label>
                <input class="form-control {{ $errors->has('transformzy') ? 'is-invalid' : '' }}" type="number" name="transformzy" id="transformzy" value="{{ old('transformzy', $newChainMatrix->transformzy) }}" step="0.00000001" required>
                @if($errors->has('transformzy'))
                    <div class="invalid-feedback">
                        {{ $errors->first('transformzy') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.newChainMatrix.fields.transformzy_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="transformzz">{{ trans('cruds.newChainMatrix.fields.transformzz') }}</label>
                <input class="form-control {{ $errors->has('transformzz') ? 'is-invalid' : '' }}" type="number" name="transformzz" id="transformzz" value="{{ old('transformzz', $newChainMatrix->transformzz) }}" step="0.00000001" required>
                @if($errors->has('transformzz'))
                    <div class="invalid-feedback">
                        {{ $errors->first('transformzz') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.newChainMatrix.fields.transformzz_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="transformzt">{{ trans('cruds.newChainMatrix.fields.transformzt') }}</label>
                <input class="form-control {{ $errors->has('transformzt') ? 'is-invalid' : '' }}" type="number" name="transformzt" id="transformzt" value="{{ old('transformzt', $newChainMatrix->transformzt) }}" step="0.00000001" required>
                @if($errors->has('transformzt'))
                    <div class="invalid-feedback">
                        {{ $errors->first('transformzt') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.newChainMatrix.fields.transformzt_helper') }}</span>
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