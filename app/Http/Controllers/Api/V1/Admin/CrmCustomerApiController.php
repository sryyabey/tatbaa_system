<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreCrmCustomerRequest;
use App\Http\Requests\UpdateCrmCustomerRequest;
use App\Http\Resources\Admin\CrmCustomerResource;
use App\Models\CrmCustomer;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CrmCustomerApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('crm_customer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CrmCustomerResource(CrmCustomer::with(['status', 'user'])->get());
    }

    public function store(StoreCrmCustomerRequest $request)
    {
        $crmCustomer = CrmCustomer::create($request->all());

        if ($request->input('photo', false)) {
            $crmCustomer->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        return (new CrmCustomerResource($crmCustomer))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(CrmCustomer $crmCustomer)
    {
        abort_if(Gate::denies('crm_customer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CrmCustomerResource($crmCustomer->load(['status', 'user']));
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

        return (new CrmCustomerResource($crmCustomer))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(CrmCustomer $crmCustomer)
    {
        abort_if(Gate::denies('crm_customer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $crmCustomer->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
