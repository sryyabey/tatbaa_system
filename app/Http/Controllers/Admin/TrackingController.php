<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTrackingRequest;
use App\Http\Requests\StoreTrackingRequest;
use App\Http\Requests\UpdateTrackingRequest;
use App\Models\CrmCustomer;
use App\Models\Tracking;
use App\Models\Transaction;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackingController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tracking_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $trackings = Tracking::with(['customer', 'user', 'transaction'])->get();

        $crm_customers = CrmCustomer::get();

        $users = User::get();

        $transactions = Transaction::get();

        return view('admin.trackings.index', compact('trackings', 'crm_customers', 'users', 'transactions'));
    }

    public function create()
    {
        abort_if(Gate::denies('tracking_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = CrmCustomer::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transactions = Transaction::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.trackings.create', compact('customers', 'users', 'transactions'));
    }

    public function store(StoreTrackingRequest $request)
    {
        $tracking = Tracking::create($request->all());

        return redirect()->route('admin.trackings.index');
    }

    public function edit(Tracking $tracking)
    {
        abort_if(Gate::denies('tracking_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = CrmCustomer::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $transactions = Transaction::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $tracking->load('customer', 'user', 'transaction');

        return view('admin.trackings.edit', compact('customers', 'users', 'transactions', 'tracking'));
    }

    public function update(UpdateTrackingRequest $request, Tracking $tracking)
    {
        $tracking->update($request->all());

        return redirect()->route('admin.trackings.index');
    }

    public function show(Tracking $tracking)
    {
        abort_if(Gate::denies('tracking_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tracking->load('customer', 'user', 'transaction');

        return view('admin.trackings.show', compact('tracking'));
    }

    public function destroy(Tracking $tracking)
    {
        abort_if(Gate::denies('tracking_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tracking->delete();

        return back();
    }

    public function massDestroy(MassDestroyTrackingRequest $request)
    {
        Tracking::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
