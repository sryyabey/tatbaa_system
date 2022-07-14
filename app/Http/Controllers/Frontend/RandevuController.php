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
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class RandevuController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('randevu_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $randevus = Randevu::with(['customer', 'user'])->get();

        return view('frontend.randevus.index', compact('randevus'));
    }

    public function quickRandevu($id){
        abort_if(Gate::denies('randevu_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customer = CrmCustomer::find($id);
        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.randevus.create', compact('customer', 'users'));
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
        //$date=Carbon::createFromFormat('d-m-Y H:s:i',Carbon::parse($request->dates)->format('d-m-Y') . " " . $request->time);

        $date = Carbon::parse($request->dates)->format('Y-m-d')." ".Carbon::parse($request->time)->format('H:s:i');
        $user_id = Auth::id();
        $request->request->add(['date'=>$date,'user_id'=>$user_id]);
        $request->only(['customer_id','user_id','date','time','description']);

        $randevu = Randevu::create([
            'user_id' => $request->user_id,
            'customer_id' => $request->customer_id,
            'date' => date('d-m-Y H:s:i',strtotime($date)),
            'description' => $request->description
        ]);

        $message=trans('cruds.randevu.title')." ".trans('global.create_success');
        Alert::success(' Başarılı', $message);
        return redirect()->back();
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
