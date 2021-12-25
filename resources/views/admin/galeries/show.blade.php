@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.galery.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.galeries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.galery.fields.id') }}
                        </th>
                        <td>
                            {{ $galery->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.galery.fields.photo') }}
                        </th>
                        <td>
                            @if($galery->photo)
                                <a href="{{ $galery->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $galery->photo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.galery.fields.title') }}
                        </th>
                        <td>
                            {{ $galery->title }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.galeries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection