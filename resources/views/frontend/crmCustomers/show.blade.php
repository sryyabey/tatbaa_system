@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.crmCustomer.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.crm-customers.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.crmCustomer.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $crmCustomer->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.crmCustomer.fields.first_name') }}
                                    </th>
                                    <td>
                                        {{ $crmCustomer->first_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.crmCustomer.fields.last_name') }}
                                    </th>
                                    <td>
                                        {{ $crmCustomer->last_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.crmCustomer.fields.status') }}
                                    </th>
                                    <td>
                                        {{ $crmCustomer->status->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.crmCustomer.fields.birthday') }}
                                    </th>
                                    <td>
                                        {{ $crmCustomer->birthday }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.crmCustomer.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $crmCustomer->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.crmCustomer.fields.phone') }}
                                    </th>
                                    <td>
                                        {{ $crmCustomer->phone }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.crmCustomer.fields.address') }}
                                    </th>
                                    <td>
                                        {{ $crmCustomer->address }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.crmCustomer.fields.photo') }}
                                    </th>
                                    <td>
                                        @if($crmCustomer->photo)
                                            <a href="{{ $crmCustomer->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $crmCustomer->photo->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.crmCustomer.fields.description') }}
                                    </th>
                                    <td>
                                        {{ $crmCustomer->description }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.crmCustomer.fields.user') }}
                                    </th>
                                    <td>
                                        {{ $crmCustomer->user->name ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.crm-customers.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection