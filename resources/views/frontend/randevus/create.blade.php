
    <div class="clearfix"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        {{ trans('global.create') }} {{ trans('cruds.randevu.title_singular') }}
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route("frontend.randevus.store") }}" enctype="multipart/form-data">
                            @method('POST')
                            @csrf
                            <div class="form-group">
                                <label for="customer_id">{{ trans('cruds.randevu.fields.customer') }}</label>
                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                                        <input class="form-control" readonly type="text" value="{{ $customer->first_name }}">
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <input class="form-control" readonly type="text" value="{{ $customer->last_name }}">
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <input class="form-control" readonly type="text" value="{{ $customer->phone }}">
                                    </div>
                                </div>

                                @if($errors->has('customer'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('customer') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.randevu.fields.customer_helper') }}</span>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date">{{ trans('cruds.randevu.fields.date') }}</label>
                                        <input class="form-control datetime" type="text" name="dates" id="randevu_date" value="{{ old('date') }}">
                                        @if($errors->has('date'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('date') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('cruds.randevu.fields.date_helper') }}</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="date">{{ trans('global.time') }}</label>
                                        <input class="form-control datetime" type="time" name="time" id="time" value="{{ old('date') }}">
                                        @if($errors->has('time'))
                                            <div class="invalid-feedback">
                                                {{ $errors->first('time') }}
                                            </div>
                                        @endif
                                        <span class="help-block">{{ trans('global.time') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="description">{{ trans('cruds.randevu.fields.description') }}</label>
                                <input class="form-control" type="text" name="description" id="description" value="{{ old('description', '') }}">
                                @if($errors->has('description'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('description') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.randevu.fields.description_helper') }}</span>
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

    <script>

        $('#randevu_date').daterangepicker({
            "singleDatePicker": true,
            "showDropdowns": true,
            "applyButtonClasses": "btn-success",
            "cancelClass": "btn-info",
            "autoApply":true,
            locale:{
                "format": "YYYY-MM-DD",
                "applyLabel": "Uygula",
                "cancelLabel": "Vazgeç",
                "separator": " - ",
                "daysOfWeek": [
                    "Pt",
                    "Sl",
                    "Çr",
                    "Pr",
                    "Cm",
                    "Ct",
                    "Pz"
                ],
                "monthNames": [
                    "Ocak",
                    "Şubat",
                    "Mart",
                    "Nisan",
                    "Mayıs",
                    "Haziran",
                    "Temmuz",
                    "Ağustos",
                    "Eylül",
                    "Ekim",
                    "Kasım",
                    "Aralık"
                ],
            }
        });
    </script>



