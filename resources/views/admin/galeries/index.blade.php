@extends('layouts.admin')
@section('content')
@can('galery_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.galeries.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.galery.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.galery.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Galery">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.galery.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.galery.fields.photo') }}
                        </th>
                        <th>
                            {{ trans('cruds.galery.fields.title') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($galeries as $key => $galery)
                        <tr data-entry-id="{{ $galery->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $galery->id ?? '' }}
                            </td>
                            <td>
                                @if($galery->photo)
                                    <a href="{{ $galery->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $galery->photo->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $galery->title ?? '' }}
                            </td>
                            <td>
                                @can('galery_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.galeries.show', $galery->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('galery_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.galeries.edit', $galery->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('galery_delete')
                                    <form action="{{ route('admin.galeries.destroy', $galery->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('galery_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.galeries.massDestroy') }}",
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
  let table = $('.datatable-Galery:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection