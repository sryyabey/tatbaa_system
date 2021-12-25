<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyHealtyRequest;
use App\Http\Requests\StoreHealtyRequest;
use App\Http\Requests\UpdateHealtyRequest;
use App\Models\Healty;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class HealtyController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('healty_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $healties = Healty::all();

        return view('frontend.healties.index', compact('healties'));
    }

    public function create()
    {
        abort_if(Gate::denies('healty_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.healties.create');
    }

    public function store(StoreHealtyRequest $request)
    {
        $healty = Healty::create($request->all());

        return redirect()->route('frontend.healties.index');
    }

    public function edit(Healty $healty)
    {
        abort_if(Gate::denies('healty_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.healties.edit', compact('healty'));
    }

    public function update(UpdateHealtyRequest $request, Healty $healty)
    {
        $healty->update($request->all());

        return redirect()->route('frontend.healties.index');
    }

    public function show(Healty $healty)
    {
        abort_if(Gate::denies('healty_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.healties.show', compact('healty'));
    }

    public function destroy(Healty $healty)
    {
        abort_if(Gate::denies('healty_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $healty->delete();

        return back();
    }

    public function massDestroy(MassDestroyHealtyRequest $request)
    {
        Healty::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
