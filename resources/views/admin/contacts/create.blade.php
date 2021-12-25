@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.contact.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.contacts.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="map">{{ trans('cruds.contact.fields.map') }}</label>
                <input class="form-control {{ $errors->has('map') ? 'is-invalid' : '' }}" type="text" name="map" id="map" value="{{ old('map', '') }}">
                @if($errors->has('map'))
                    <span class="text-danger">{{ $errors->first('map') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contact.fields.map_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="adress">{{ trans('cruds.contact.fields.adress') }}</label>
                <input class="form-control {{ $errors->has('adress') ? 'is-invalid' : '' }}" type="text" name="adress" id="adress" value="{{ old('adress', '') }}">
                @if($errors->has('adress'))
                    <span class="text-danger">{{ $errors->first('adress') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contact.fields.adress_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.contact.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email', '') }}">
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contact.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone">{{ trans('cruds.contact.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', '') }}">
                @if($errors->has('phone'))
                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contact.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone_2">{{ trans('cruds.contact.fields.phone_2') }}</label>
                <input class="form-control {{ $errors->has('phone_2') ? 'is-invalid' : '' }}" type="text" name="phone_2" id="phone_2" value="{{ old('phone_2', '') }}">
                @if($errors->has('phone_2'))
                    <span class="text-danger">{{ $errors->first('phone_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contact.fields.phone_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mobile">{{ trans('cruds.contact.fields.mobile') }}</label>
                <input class="form-control {{ $errors->has('mobile') ? 'is-invalid' : '' }}" type="text" name="mobile" id="mobile" value="{{ old('mobile', '') }}">
                @if($errors->has('mobile'))
                    <span class="text-danger">{{ $errors->first('mobile') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contact.fields.mobile_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="mobile_2">{{ trans('cruds.contact.fields.mobile_2') }}</label>
                <input class="form-control {{ $errors->has('mobile_2') ? 'is-invalid' : '' }}" type="text" name="mobile_2" id="mobile_2" value="{{ old('mobile_2', '') }}">
                @if($errors->has('mobile_2'))
                    <span class="text-danger">{{ $errors->first('mobile_2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contact.fields.mobile_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fax">{{ trans('cruds.contact.fields.fax') }}</label>
                <input class="form-control {{ $errors->has('fax') ? 'is-invalid' : '' }}" type="text" name="fax" id="fax" value="{{ old('fax', '') }}">
                @if($errors->has('fax'))
                    <span class="text-danger">{{ $errors->first('fax') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.contact.fields.fax_helper') }}</span>
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