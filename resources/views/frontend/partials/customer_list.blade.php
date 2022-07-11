@forelse($customers as $customer)
    <tr>
        <td>{{ $customer->first_name }}</td>
        <td>{{ $customer->last_name }}</td>
        <td>{{ $customer->phone }}</td>
        <td>{{ $customer->address }}</td>
        <td>
            <a type="button" class="btn btn-sm btn-danger" title="{{ trans('global.view') }}" onclick="view(this)" data-url="{{ route('frontend.crm-customers.show', $customer->id) }}" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-file" title="{{ trans('global.view') }}"></i>
            </a>

            <a type="button" class="btn btn-sm btn-info" title="{{ trans('global.edit') }}" onclick="view(this)" data-url="{{ route('frontend.crm-customers.edit', $customer->id) }}" data-toggle="modal" data-target="#exampleModal">
                <i class="fa fa-edit" title="{{ trans('global.edit') }}"></i>
            </a>
        </td>
    </tr>
@empty
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
@endforelse
