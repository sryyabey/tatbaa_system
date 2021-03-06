<?php

namespace App\Http\Controllers\Admin;

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
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CrmCustomerController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('crm_customer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $crmCustomers = CrmCustomer::with(['status', 'user', 'media'])->get();

        $crm_statuses = CrmStatus::get();

        $users = User::get();

        return view('admin.crmCustomers.index', compact('crmCustomers', 'crm_statuses', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('crm_customer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $statuses = CrmStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.crmCustomers.create', compact('statuses', 'users'));
    }

    public function store(StoreCrmCustomerRequest $request)
    {
        $crmCustomer = CrmCustomer::create($request->all());

        if ($request->input('photo', false)) {
            $crmCustomer->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $crmCustomer->id]);
        }

        return redirect()->route('admin.crm-customers.index');
    }

    public function edit(CrmCustomer $crmCustomer)
    {
        abort_if(Gate::denies('crm_customer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $statuses = CrmStatus::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $crmCustomer->load('status', 'user');

        return view('admin.crmCustomers.edit', compact('crmCustomer', 'statuses', 'users'));
    }

    public function update(UpdateCrmCustomerRequest $request, CrmCustomer $crmCustomer)
    {
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

        return redirect()->route('admin.crm-customers.index');
    }

    public function show(CrmCustomer $crmCustomer)
    {
        abort_if(Gate::denies('crm_customer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $crmCustomer->load('status', 'user');

        return view('admin.crmCustomers.show', compact('crmCustomer'));
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
