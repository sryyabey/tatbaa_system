@extends('layouts.admin')
@section('content')
@can('healty_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.healties.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.healty.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.healty.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Healty">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.healty.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.healty.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.healty.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.healty.fields.icon') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($healties as $key => $healty)
                        <tr data-entry-id="{{ $healty->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $healty->id ?? '' }}
                            </td>
                            <td>
                                {{ $healty->title ?? '' }}
                            </td>
                            <td>
                                {{ $healty->description ?? '' }}
                            </td>
                            <td>
                                {{ $healty->icon ?? '' }}
                            </td>
                            <td>
                                @can('healty_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.healties.show', $healty->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('healty_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.healties.edit', $healty->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('healty_delete')
                                    <form action="{{ route('admin.healties.destroy', $healty->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('healty_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.healties.massDestroy') }}",
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
  let table = $('.datatable-Healty:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection