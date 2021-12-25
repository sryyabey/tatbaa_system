<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyGaleryRequest;
use App\Http\Requests\StoreGaleryRequest;
use App\Http\Requests\UpdateGaleryRequest;
use App\Models\Galery;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class GaleryController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('galery_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $galeries = Galery::with(['media'])->get();

        return view('admin.galeries.index', compact('galeries'));
    }

    public function create()
    {
        abort_if(Gate::denies('galery_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.galeries.create');
    }

    public function store(StoreGaleryRequest $request)
    {
        $galery = Galery::create($request->all());

        if ($request->input('photo', false)) {
            $galery->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $galery->id]);
        }

        return redirect()->route('admin.galeries.index');
    }

    public function edit(Galery $galery)
    {
        abort_if(Gate::denies('galery_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.galeries.edit', compact('galery'));
    }

    public function update(UpdateGaleryRequest $request, Galery $galery)
    {
        $galery->update($request->all());

        if ($request->input('photo', false)) {
            if (!$galery->photo || $request->input('photo') !== $galery->photo->file_name) {
                if ($galery->photo) {
                    $galery->photo->delete();
                }
                $galery->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($galery->photo) {
            $galery->photo->delete();
        }

        return redirect()->route('admin.galeries.index');
    }

    public function show(Galery $galery)
    {
        abort_if(Gate::denies('galery_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.galeries.show', compact('galery'));
    }

    public function destroy(Galery $galery)
    {
        abort_if(Gate::denies('galery_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $galery->delete();

        return back();
    }

    public function massDestroy(MassDestroyGaleryRequest $request)
    {
        Galery::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('galery_create') && Gate::denies('galery_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Galery();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
