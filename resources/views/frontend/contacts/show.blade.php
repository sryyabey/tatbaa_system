@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.show') }} {{ trans('cruds.contact.title') }}
                </div>

                <div class="card-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.contacts.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contact.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $contact->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contact.fields.map') }}
                                    </th>
                                    <td>
                                        {{ $contact->map }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contact.fields.adress') }}
                                    </th>
                                    <td>
                                        {{ $contact->adress }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contact.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $contact->email }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contact.fields.phone') }}
                                    </th>
                                    <td>
                                        {{ $contact->phone }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contact.fields.phone_2') }}
                                    </th>
                                    <td>
                                        {{ $contact->phone_2 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contact.fields.mobile') }}
                                    </th>
                                    <td>
                                        {{ $contact->mobile }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contact.fields.mobile_2') }}
                                    </th>
                                    <td>
                                        {{ $contact->mobile_2 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.contact.fields.fax') }}
                                    </th>
                                    <td>
                                        {{ $contact->fax }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('frontend.contacts.index') }}">
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