@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.pdbtm.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.pdbtms.update", [$pdbtm->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="matrix">{{ trans('cruds.pdbtm.fields.matrix') }}</label>
                <input class="form-control {{ $errors->has('matrix') ? 'is-invalid' : '' }}" type="number" name="matrix" id="matrix" value="{{ old('matrix', $pdbtm->matrix) }}" step="1" required>
                @if($errors->has('matrix'))
                    <div class="invalid-feedback">
                        {{ $errors->first('matrix') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pdbtm.fields.matrix_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.pdbtm.fields.transmembrane') }}</label>
                <select class="form-control {{ $errors->has('transmembrane') ? 'is-invalid' : '' }}" name="transmembrane" id="transmembrane" required>
                    <option value disabled {{ old('transmembrane', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Pdbtm::TRANSMEMBRANE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('transmembrane', $pdbtm->transmembrane) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('transmembrane'))
                    <div class="invalid-feedback">
                        {{ $errors->first('transmembrane') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pdbtm.fields.transmembrane_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="qvalue">{{ trans('cruds.pdbtm.fields.qvalue') }}</label>
                <input class="form-control {{ $errors->has('qvalue') ? 'is-invalid' : '' }}" type="number" name="qvalue" id="qvalue" value="{{ old('qvalue', $pdbtm->qvalue) }}" step="0.01" required>
                @if($errors->has('qvalue'))
                    <div class="invalid-feedback">
                        {{ $errors->first('qvalue') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pdbtm.fields.qvalue_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.pdbtm.fields.tmtype') }}</label>
                <select class="form-control {{ $errors->has('tmtype') ? 'is-invalid' : '' }}" name="tmtype" id="tmtype" required>
                    <option value disabled {{ old('tmtype', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Pdbtm::TMTYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('tmtype', $pdbtm->tmtype) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('tmtype'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tmtype') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pdbtm.fields.tmtype_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="x">{{ trans('cruds.pdbtm.fields.x') }}</label>
                <input class="form-control {{ $errors->has('x') ? 'is-invalid' : '' }}" type="number" name="x" id="x" value="{{ old('x', $pdbtm->x) }}" step="0.00000001" required>
                @if($errors->has('x'))
                    <div class="invalid-feedback">
                        {{ $errors->first('x') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pdbtm.fields.x_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="y">{{ trans('cruds.pdbtm.fields.y') }}</label>
                <input class="form-control {{ $errors->has('y') ? 'is-invalid' : '' }}" type="number" name="y" id="y" value="{{ old('y', $pdbtm->y) }}" step="0.00000001" required>
                @if($errors->has('y'))
                    <div class="invalid-feedback">
                        {{ $errors->first('y') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pdbtm.fields.y_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="z">{{ trans('cruds.pdbtm.fields.z') }}</label>
                <input class="form-control {{ $errors->has('z') ? 'is-invalid' : '' }}" type="number" name="z" id="z" value="{{ old('z', $pdbtm->z) }}" step="0.00000001" required>
                @if($errors->has('z'))
                    <div class="invalid-feedback">
                        {{ $errors->first('z') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pdbtm.fields.z_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="xx">{{ trans('cruds.pdbtm.fields.xx') }}</label>
                <input class="form-control {{ $errors->has('xx') ? 'is-invalid' : '' }}" type="number" name="xx" id="xx" value="{{ old('xx', $pdbtm->xx) }}" step="0.00000001" required>
                @if($errors->has('xx'))
                    <div class="invalid-feedback">
                        {{ $errors->first('xx') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pdbtm.fields.xx_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="xy">{{ trans('cruds.pdbtm.fields.xy') }}</label>
                <input class="form-control {{ $errors->has('xy') ? 'is-invalid' : '' }}" type="number" name="xy" id="xy" value="{{ old('xy', $pdbtm->xy) }}" step="0.00000001" required>
                @if($errors->has('xy'))
                    <div class="invalid-feedback">
                        {{ $errors->first('xy') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pdbtm.fields.xy_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="xz">{{ trans('cruds.pdbtm.fields.xz') }}</label>
                <input class="form-control {{ $errors->has('xz') ? 'is-invalid' : '' }}" type="number" name="xz" id="xz" value="{{ old('xz', $pdbtm->xz) }}" step="0.00000001" required>
                @if($errors->has('xz'))
                    <div class="invalid-feedback">
                        {{ $errors->first('xz') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pdbtm.fields.xz_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="xt">{{ trans('cruds.pdbtm.fields.xt') }}</label>
                <input class="form-control {{ $errors->has('xt') ? 'is-invalid' : '' }}" type="number" name="xt" id="xt" value="{{ old('xt', $pdbtm->xt) }}" step="0.00000001" required>
                @if($errors->has('xt'))
                    <div class="invalid-feedback">
                        {{ $errors->first('xt') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pdbtm.fields.xt_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="yx">{{ trans('cruds.pdbtm.fields.yx') }}</label>
                <input class="form-control {{ $errors->has('yx') ? 'is-invalid' : '' }}" type="number" name="yx" id="yx" value="{{ old('yx', $pdbtm->yx) }}" step="0.00000001" required>
                @if($errors->has('yx'))
                    <div class="invalid-feedback">
                        {{ $errors->first('yx') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pdbtm.fields.yx_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="yy">{{ trans('cruds.pdbtm.fields.yy') }}</label>
                <input class="form-control {{ $errors->has('yy') ? 'is-invalid' : '' }}" type="number" name="yy" id="yy" value="{{ old('yy', $pdbtm->yy) }}" step="0.00000001" required>
                @if($errors->has('yy'))
                    <div class="invalid-feedback">
                        {{ $errors->first('yy') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pdbtm.fields.yy_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="yz">{{ trans('cruds.pdbtm.fields.yz') }}</label>
                <input class="form-control {{ $errors->has('yz') ? 'is-invalid' : '' }}" type="number" name="yz" id="yz" value="{{ old('yz', $pdbtm->yz) }}" step="0.00000001" required>
                @if($errors->has('yz'))
                    <div class="invalid-feedback">
                        {{ $errors->first('yz') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pdbtm.fields.yz_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="yt">{{ trans('cruds.pdbtm.fields.yt') }}</label>
                <input class="form-control {{ $errors->has('yt') ? 'is-invalid' : '' }}" type="number" name="yt" id="yt" value="{{ old('yt', $pdbtm->yt) }}" step="0.00000001" required>
                @if($errors->has('yt'))
                    <div class="invalid-feedback">
                        {{ $errors->first('yt') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pdbtm.fields.yt_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="zx">{{ trans('cruds.pdbtm.fields.zx') }}</label>
                <input class="form-control {{ $errors->has('zx') ? 'is-invalid' : '' }}" type="number" name="zx" id="zx" value="{{ old('zx', $pdbtm->zx) }}" step="0.00000001" required>
                @if($errors->has('zx'))
                    <div class="invalid-feedback">
                        {{ $errors->first('zx') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pdbtm.fields.zx_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="zy">{{ trans('cruds.pdbtm.fields.zy') }}</label>
                <input class="form-control {{ $errors->has('zy') ? 'is-invalid' : '' }}" type="number" name="zy" id="zy" value="{{ old('zy', $pdbtm->zy) }}" step="0.00000001" required>
                @if($errors->has('zy'))
                    <div class="invalid-feedback">
                        {{ $errors->first('zy') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pdbtm.fields.zy_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="zz">{{ trans('cruds.pdbtm.fields.zz') }}</label>
                <input class="form-control {{ $errors->has('zz') ? 'is-invalid' : '' }}" type="number" name="zz" id="zz" value="{{ old('zz', $pdbtm->zz) }}" step="0.00000001" required>
                @if($errors->has('zz'))
                    <div class="invalid-feedback">
                        {{ $errors->first('zz') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pdbtm.fields.zz_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="zt">{{ trans('cruds.pdbtm.fields.zt') }}</label>
                <input class="form-control {{ $errors->has('zt') ? 'is-invalid' : '' }}" type="number" name="zt" id="zt" value="{{ old('zt', $pdbtm->zt) }}" step="0.00000001" required>
                @if($errors->has('zt'))
                    <div class="invalid-feedback">
                        {{ $errors->first('zt') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pdbtm.fields.zt_helper') }}</span>
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