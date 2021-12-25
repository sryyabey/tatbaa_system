<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCrmStatusRequest;
use App\Http\Requests\StoreCrmStatusRequest;
use App\Http\Requests\UpdateCrmStatusRequest;
use App\Models\CrmStatus;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CrmStatusController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('crm_status_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $crmStatuses = CrmStatus::with(['user'])->get();

        $users = User::get();

        return view('admin.crmStatuses.index', compact('crmStatuses', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('crm_status_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.crmStatuses.create', compact('users'));
    }

    public function store(StoreCrmStatusRequest $request)
    {
        $crmStatus = CrmStatus::create($request->all());

        return redirect()->route('admin.crm-statuses.index');
    }

    public function edit(CrmStatus $crmStatus)
    {
        abort_if(Gate::denies('crm_status_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $crmStatus->load('user');

        return view('admin.crmStatuses.edit', compact('users', 'crmStatus'));
    }

    public function update(UpdateCrmStatusRequest $request, CrmStatus $crmStatus)
    {
        $crmStatus->update($request->all());

        return redirect()->route('admin.crm-statuses.index');
    }

    public function show(CrmStatus $crmStatus)
    {
        abort_if(Gate::denies('crm_status_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $crmStatus->load('user');

        return view('admin.crmStatuses.show', compact('crmStatus'));
    }

    public function destroy(CrmStatus $crmStatus)
    {
        abort_if(Gate::denies('crm_status_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $crmStatus->delete();

        return back();
    }

    public function massDestroy(MassDestroyCrmStatusRequest $request)
    {
        CrmStatus::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
