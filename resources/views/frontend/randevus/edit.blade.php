
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.randevu.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.randevus.update", [$randevu->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="customer_id">{{ trans('cruds.randevu.fields.customer') }}</label>
                            <select class="form-control select2" name="customer_id" id="customer_id">
                                @foreach($customers as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('customer_id') ? old('customer_id') : $randevu->customer->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('customer'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('customer') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.randevu.fields.customer_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="user_id">{{ trans('cruds.randevu.fields.user') }}</label>
                            <select class="form-control select2" name="user_id" id="user_id">
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $randevu->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('user'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('user') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.randevu.fields.user_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="date">{{ trans('cruds.randevu.fields.date') }}</label>
                            <input class="form-control datetime" type="text" name="date" id="date" value="{{ old('date', $randevu->date) }}">
                            @if($errors->has('date'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('date') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.randevu.fields.date_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="description">{{ trans('cruds.randevu.fields.description') }}</label>
                            <input class="form-control" type="text" name="description" id="description" value="{{ old('description', $randevu->description) }}">
                            @if($errors->has('description'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('description') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.randevu.fields.description_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="status">{{ trans('cruds.randevu.fields.status') }}</label>
                            <input class="form-control" type="number" name="status" id="status" value="{{ old('status', $randevu->status) }}" step="1">
                            @if($errors->has('status'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('status') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.randevu.fields.status_helper') }}</span>
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
