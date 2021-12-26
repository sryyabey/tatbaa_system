@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('randevu_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.randevus.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.randevu.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.randevu.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Randevu">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.randevu.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.randevu.fields.customer') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.randevu.fields.user') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.randevu.fields.date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.randevu.fields.description') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.randevu.fields.status') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($randevus as $key => $randevu)
                                    <tr data-entry-id="{{ $randevu->id }}">
                                        <td>
                                            {{ $randevu->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $randevu->customer->first_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $randevu->user->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $randevu->date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $randevu->description ?? '' }}
                                        </td>
                                        <td>
                                            {{ $randevu->status ?? '' }}
                                        </td>
                                        <td>
                                            @can('randevu_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.randevus.show', $randevu->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('randevu_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.randevus.edit', $randevu->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('randevu_delete')
                                                <form action="{{ route('frontend.randevus.destroy', $randevu->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('randevu_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.randevus.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Randevu:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection