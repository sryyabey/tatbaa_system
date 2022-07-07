@extends('frontend.layouts.app')
@section('head')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <style>
        tfoot input {
            width: 100%;
            padding: 3px;
            box-sizing: border-box;
        }
    </style>
@endsection
@section('content')
    <div class="clearfix"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @can('crm_customer_create')
                    <div style="margin-bottom: 10px;" class="row">
                        <div class="col-lg-12">
                            <a class="btn btn-success" href="{{ route('frontend.crm-customers.create') }}">
                                {{ trans('global.add') }} {{ trans('cruds.crmCustomer.title_singular') }}
                            </a>
                        </div>
                    </div>
                @endcan
                <div class="card">
                    <div class="card-header">
                        {{ trans('cruds.crmCustomer.title_singular') }} {{ trans('global.list') }}
                    </div>
                    <hr>

                    <div class="card-body container">
                        <table id="example" class="display" style="width:100%">
                            <thead>
                            <tr>
                                <th>{{ trans('global.name') }}</th>
                                <th>{{ trans('global.last_name') }}</th>
                                <th>{{ trans('cruds.crmCustomer.fields.birthday') }}</th>
                                <th>{{ trans('global.login_email') }}</th>
                                <th>{{ trans('global.phone') }}</th>
                                <th>{{ trans('global.address') }}</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($crmCustomers as $key => $crmCustomer)
                            <tr>
                            <td>
                                {{ $crmCustomer->first_name ?? '' }}
                            </td>
                            <td>
                                {{ $crmCustomer->last_name ?? '' }}
                            </td>
                            <td>
                                {{ $crmCustomer->birthday ?? '' }}
                            </td>
                            <td>
                                {{ $crmCustomer->email ?? '' }}
                            </td>
                            <td>
                                {{ $crmCustomer->phone ?? '' }}
                            </td>
                            <td>
                                {{ $crmCustomer->address ?? '' }}
                            </td>
                            <td>
                                <div class="row container container-fluid">
                                    <div class="col-md-4 col-sm-4">
                                        @can('crm_customer_show')
                                            <a type="button" class="btn btn-sm btn-outline-secondary" title="{{ trans('global.view') }}" onclick="view(this)" data-url="{{ route('frontend.crm-customers.show', $crmCustomer->id) }}" data-toggle="modal" data-target="#exampleModal">
                                                <i class="fa fa-file" title="{{ trans('global.view') }}"></i>
                                            </a>
                                        @endcan
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        @can('crm_customer_edit')
                                            <a type="button" class="btn btn-sm btn-outline-info" title="{{ trans('global.edit') }}" onclick="view(this)" data-url="{{ route('frontend.crm-customers.edit', $crmCustomer->id) }}" data-toggle="modal" data-target="#exampleModal">
                                                <i class="fa fa-edit" title="{{ trans('global.edit') }}"></i>
                                            </a>
                                        @endcan
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        @can('crm_customer_delete')
                                            <form action="{{ route('frontend.crm-customers.destroy', $crmCustomer->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="{{ trans('global.delete') }}" value="{{ trans('global.delete') }}"><i class="fa fa-trash"></i></button>

                                            </form>
                                        @endcan
                                    </div>
                                </div>

                            </td>
                            </tr>
                            @endforeach

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>{{ trans('global.name') }}</th>
                                <th>{{ trans('global.last_name') }}</th>
                                <th>{{ trans('cruds.crmCustomer.fields.birthday') }}</th>
                                <th>{{ trans('global.login_email') }}</th>
                                <th>{{ trans('global.phone') }}</th>
                                <th>{{ trans('global.address') }}</th>
                                <th></th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('script')

    @parent
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {
            // Setup - add a text input to each footer cell
            $('#example tfoot th').each(function () {
                var title = $(this).text();
                $(this).html('<input type="text" placeholder="Search ' + title + '" />');
            });

            // DataTable
            var table = $('#example').DataTable({
                initComplete: function () {
                    // Apply the search
                    this.api()
                        .columns()
                        .every(function () {
                            var that = this;

                            $('input', this.footer()).on('keyup change clear', function () {
                                if (that.search() !== this.value) {
                                    that.search(this.value).draw();
                                }
                            });
                        });
                },
            });
        });
    </script>
@endsection


