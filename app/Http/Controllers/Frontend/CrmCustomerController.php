<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCrmCustomerRequest;
use App\Http\Requests\StoreCrmCustomerRequest;
use App\Http\Requests\UpdateCrmCustomerRequest;
use App\Models\CrmCustomer;
use App\Models\CrmStatus;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use RealRashid\SweetAlert\Facades\Alert;

class CrmCustomerController extends Controller
{
    use MediaUploadingTrait;

    public function get_customer(Request $request){
        $name = $request->name ?? null;
        $lastname = $request->lastname ?? null;
        $phone = $request->phone ?? null;
        $user=Auth::id();
        if (!is_null($name) or !is_null($lastname) or !is_null($phone)){
            $customers= CrmCustomer::where('user_id',$user)
                ->where('first_name','like','%'.$name.'%')
                ->where('last_name','like','%'.$lastname.'%')
                ->where('phone','like','%'.$phone.'%')->get();

            return view('frontend.partials.customer_list',compact('customers'));
        }else{
            return false;
        }

    }

    public function index()
    {
        abort_if(Gate::denies('crm_customer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $crmCustomers = CrmCustomer::with(['status', 'user', 'media'])->get();

        $crm_statuses = CrmStatus::get();

        $users = User::get();

        return view('frontend.crmCustomers.index', compact('crmCustomers', 'crm_statuses', 'users'));
    }

    public function find_customer(Request $request){

    }

    public function create()
    {
        abort_if(Gate::denies('crm_customer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $statuses = CrmStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.crmCustomers.create', compact('statuses', 'users'));
    }

    public function store(StoreCrmCustomerRequest $request)
    {

        $request->merge(['birthday',date('Y-m-d',strtotime($request->birthday))]);
        $request->request->add(['user_id' => Auth::user()->id]);

        $crmCustomer = CrmCustomer::create($request->all());

        if ($request->input('photo', false)) {
            $crmCustomer->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $crmCustomer->id]);
        }

        $message= $crmCustomer->first_name." ".$crmCustomer->last_name;

        Alert::success('Kayıt Başarılı', $message);
        return redirect()->back();
    }

    public function edit(CrmCustomer $crmCustomer)
    {
        abort_if(Gate::denies('crm_customer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $statuses = CrmStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $crmCustomer->load('status', 'user');

        return view('frontend.crmCustomers.edit', compact('crmCustomer', 'statuses', 'users'));
    }

    public function update(UpdateCrmCustomerRequest $request, CrmCustomer $crmCustomer)
    {
        $request->request->add(['user_id' => Auth::user()->id]);
        $crmCustomer->update($request->all());

        if ($request->input('photo', false)) {
            if (!$crmCustomer->photo || $request->input('photo') !== $crmCustomer->photo->file_name) {
                if ($crmCustomer->photo) {
                    $crmCustomer->photo->delete();
                }
                $crmCustomer->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($crmCustomer->photo) {
            $crmCustomer->photo->delete();
        }

        return redirect()->route('frontend.crm-customers.index');
    }

    public function show(CrmCustomer $crmCustomer)
    {
        abort_if(Gate::denies('crm_customer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $crmCustomer->load('status', 'user');

        return view('frontend.crmCustomers.show', compact('crmCustomer'));
    }

    public function destroy(CrmCustomer $crmCustomer)
    {
        abort_if(Gate::denies('crm_customer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $crmCustomer->delete();

        return back();
    }

    public function massDestroy(MassDestroyCrmCustomerRequest $request)
    {
        CrmCustomer::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('crm_customer_create') && Gate::denies('crm_customer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new CrmCustomer();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
