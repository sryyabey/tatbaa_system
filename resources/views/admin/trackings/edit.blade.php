@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.tracking.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.trackings.update", [$tracking->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="customer_id">{{ trans('cruds.tracking.fields.customer') }}</label>
                <select class="form-control select2 {{ $errors->has('customer') ? 'is-invalid' : '' }}" name="customer_id" id="customer_id">
                    @foreach($customers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('customer_id') ? old('customer_id') : $tracking->customer->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('customer'))
                    <span class="text-danger">{{ $errors->first('customer') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tracking.fields.customer_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.tracking.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $tracking->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tracking.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="transaction_id">{{ trans('cruds.tracking.fields.transaction') }}</label>
                <select class="form-control select2 {{ $errors->has('transaction') ? 'is-invalid' : '' }}" name="transaction_id" id="transaction_id">
                    @foreach($transactions as $id => $entry)
                        <option value="{{ $id }}" {{ (old('transaction_id') ? old('transaction_id') : $tracking->transaction->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('transaction'))
                    <span class="text-danger">{{ $errors->first('transaction') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tracking.fields.transaction_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="process_time">{{ trans('cruds.tracking.fields.process_time') }}</label>
                <input class="form-control datetime {{ $errors->has('process_time') ? 'is-invalid' : '' }}" type="text" name="process_time" id="process_time" value="{{ old('process_time', $tracking->process_time) }}">
                @if($errors->has('process_time'))
                    <span class="text-danger">{{ $errors->first('process_time') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.tracking.fields.process_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="note">{{ trans('cruds.tracking.fields.note') }}</label>
                <textarea class="form-control {{ $errors->has('note') ? 'is-invalid' : '' }}" name="note" id="note">{{ old('note', $tracking->note) }}</textarea>
                @if($errors->has('note'))
                    <span class="text-danger">{{ $errors->first('note') }}</span>
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



@endsection