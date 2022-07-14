
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.randevu.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.randevus.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.randevu.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $randevu->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.randevu.fields.customer') }}
                                    </th>
                                    <td>
                                        {{ $randevu->customer->first_name ?? '' }} <br>
                                        {{ $randevu->customer->last_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contact.fields.phone') }}
                                    </th>
                                    <td>
                                        {{ $randevu->customer->phone ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.randevu.fields.date') }}
                                    </th>
                                    <td>
                                        {{ $randevu->date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.randevu.fields.description') }}
                                    </th>
                                    <td>
                                        {{ $randevu->description }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.randevu.fields.status') }}
                                    </th>
                                    <td>
                                        {{ $randevu->status }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.randevus.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
