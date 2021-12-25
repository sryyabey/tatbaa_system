@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.tracking.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.trackings.update", [$tracking->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="customer_id">{{ trans('cruds.tracking.fields.customer') }}</label>
                            <select class="form-control select2" name="customer_id" id="customer_id">
                                @foreach($customers as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('customer_id') ? old('customer_id') : $tracking->customer->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('customer'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('customer') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.tracking.fields.customer_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="user_id">{{ trans('cruds.tracking.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id">
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $tracking->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('user') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.tracking.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="transaction_id">{{ trans('cruds.tracking.fields.transaction') }}</label>
                            <select class="form-control select2" name="transaction_id" id="transaction_id">
                                @foreach($transactions as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('transaction_id') ? old('transaction_id') : $tracking->transaction->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('transaction'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('transaction') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.tracking.fields.transaction_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="process_time">{{ trans('cruds.tracking.fields.process_time') }}</label>
                            <input class="form-control datetime" type="text" name="process_time" id="process_time" value="{{ old('process_time', $tracking->process_time) }}">
                            @if($errors->has('process_time'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('process_time') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.tracking.fields.process_time_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="note">{{ trans('cruds.tracking.fields.note') }}</label>
                            <textarea class="form-control" name="note" id="note">{{ old('note', $tracking->note) }}</textarea>
                            @if($errors->has('note'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('note') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.tracking.fields.note_helper') }}</span>
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