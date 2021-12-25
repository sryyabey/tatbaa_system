@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('comment_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.comments.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.comment.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.comment.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Comment">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.comment.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.comment.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.comment.fields.expertise') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.comment.fields.comment') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.comment.fields.photo') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($comments as $key => $comment)
                                    <tr data-entry-id="{{ $comment->id }}">
                                        <td>
                                            {{ $comment->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $comment->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $comment->expertise ?? '' }}
                                        </td>
                                        <td>
                                            {{ $comment->comment ?? '' }}
                                        </td>
                                        <td>
                                            @if($comment->photo)
                                                <a href="{{ $comment->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $comment->photo->getUrl('thumb') }}">
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            @can('comment_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.comments.show', $comment->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('comment_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.comments.edit', $comment->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('comment_delete')
                                                <form action="{{ route('frontend.comments.destroy', $comment->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('comment_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.comments.massDestroy') }}",
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
  let table = $('.datatable-Comment:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection