<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCommentRequest;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CommentsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('comment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $comments = Comment::with(['media'])->get();

        return view('admin.comments.index', compact('comments'));
    }

    public function create()
    {
        abort_if(Gate::denies('comment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.comments.create');
    }

    public function store(StoreCommentRequest $request)
    {
        $comment = Comment::create($request->all());

        if ($request->input('photo', false)) {
            $comment->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $comment->id]);
        }

        return redirect()->route('admin.comments.index');
    }

    public function edit(Comment $comment)
    {
        abort_if(Gate::denies('comment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.comments.edit', compact('comment'));
    }

    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        $comment->update($request->all());

        if ($request->input('photo', false)) {
            if (!$comment->photo || $request->input('photo') !== $comment->photo->file_name) {
                if ($comment->photo) {
                    $comment->photo->delete();
                }
                $comment->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($comment->photo) {
            $comment->photo->delete();
        }

        return redirect()->route('admin.comments.index');
    }

    public function show(Comment $comment)
    {
        abort_if(Gate::denies('comment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.comments.show', compact('comment'));
    }

    public function destroy(Comment $comment)
    {
        abort_if(Gate::denies('comment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $comment->delete();

        return back();
    }

    public function massDestroy(MassDestroyCommentRequest $request)
    {
        Comment::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('comment_create') && Gate::denies('comment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Comment();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
