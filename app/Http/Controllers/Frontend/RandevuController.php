<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRandevuRequest;
use App\Http\Requests\StoreRandevuRequest;
use App\Http\Requests\UpdateRandevuRequest;
use App\Models\CrmCustomer;
use App\Models\Randevu;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RandevuController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('randevu_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $randevus = Randevu::with(['customer', 'user'])->get();

        return view('frontend.randevus.index', compact('randevus'));
    }

    public function create()
    {
        abort_if(Gate::denies('randevu_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = CrmCustomer::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.randevus.create', compact('customers', 'users'));
    }

    public function store(StoreRandevuRequest $request)
    {
        $randevu = Randevu::create($request->all());

        return redirect()->route('frontend.randevus.index');
    }

    public function edit(Randevu $randevu)
    {
        abort_if(Gate::denies('randevu_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = CrmCustomer::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $randevu->load('customer', 'user');

        return view('frontend.randevus.edit', compact('customers', 'randevu', 'users'));
    }

    public function update(UpdateRandevuRequest $request, Randevu $randevu)
    {
        $randevu->update($request->all());

        return redirect()->route('frontend.randevus.index');
    }

    public function show(Randevu $randevu)
    {
        abort_if(Gate::denies('randevu_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $randevu->load('customer', 'user');

        return view('frontend.randevus.show', compact('randevu'));
    }

    public function destroy(Randevu $randevu)
    {
        abort_if(Gate::denies('randevu_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $randevu->delete();

        return back();
    }

    public function massDestroy(MassDestroyRandevuRequest $request)
    {
        Randevu::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
