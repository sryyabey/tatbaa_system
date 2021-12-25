@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.contact.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.contacts.update", [$contact->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="map">{{ trans('cruds.contact.fields.map') }}</label>
                            <input class="form-control" type="text" name="map" id="map" value="{{ old('map', $contact->map) }}">
                            @if($errors->has('map'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('map') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contact.fields.map_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="adress">{{ trans('cruds.contact.fields.adress') }}</label>
                            <input class="form-control" type="text" name="adress" id="adress" value="{{ old('adress', $contact->adress) }}">
                            @if($errors->has('adress'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('adress') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contact.fields.adress_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="email">{{ trans('cruds.contact.fields.email') }}</label>
                            <input class="form-control" type="text" name="email" id="email" value="{{ old('email', $contact->email) }}">
                            @if($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contact.fields.email_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="phone">{{ trans('cruds.contact.fields.phone') }}</label>
                            <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone', $contact->phone) }}">
                            @if($errors->has('phone'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('phone') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contact.fields.phone_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="phone_2">{{ trans('cruds.contact.fields.phone_2') }}</label>
                            <input class="form-control" type="text" name="phone_2" id="phone_2" value="{{ old('phone_2', $contact->phone_2) }}">
                            @if($errors->has('phone_2'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('phone_2') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contact.fields.phone_2_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="mobile">{{ trans('cruds.contact.fields.mobile') }}</label>
                            <input class="form-control" type="text" name="mobile" id="mobile" value="{{ old('mobile', $contact->mobile) }}">
                            @if($errors->has('mobile'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('mobile') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contact.fields.mobile_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="mobile_2">{{ trans('cruds.contact.fields.mobile_2') }}</label>
                            <input class="form-control" type="text" name="mobile_2" id="mobile_2" value="{{ old('mobile_2', $contact->mobile_2) }}">
                            @if($errors->has('mobile_2'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('mobile_2') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.contact.fields.mobile_2_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="fax">{{ trans('cruds.contact.fields.fax') }}</label>
                            <input class="form-control" type="text" name="fax" id="fax" value="{{ old('fax', $contact->fax) }}">
                            @if($errors->has('fax'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('fax') }}
                                </div>
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

        </div>
    </div>
</div>
@endsection