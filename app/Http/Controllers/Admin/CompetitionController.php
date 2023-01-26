<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyCompetitionRequest;
use App\Http\Requests\StoreCompetitionRequest;
use App\Http\Requests\UpdateCompetitionRequest;
use App\Models\Competition;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class CompetitionController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('competition_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $competitions = Competition::with(['media'])->get();

        return view('admin.competitions.index', compact('competitions'));
    }

    public function create()
    {
        abort_if(Gate::denies('competition_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.competitions.create');
    }

    public function store(StoreCompetitionRequest $request)
    {
        $competition = Competition::create($request->all());

        if ($request->input('icon', false)) {
            $competition->addMedia(storage_path('tmp/uploads/' . basename($request->input('icon'))))->toMediaCollection('icon');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $competition->id]);
        }

        return redirect()->route('admin.competitions.index');
    }

    public function edit(Competition $competition)
    {
        abort_if(Gate::denies('competition_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.competitions.edit', compact('competition'));
    }

    public function update(UpdateCompetitionRequest $request, Competition $competition)
    {
        $competition->update($request->all());

        if ($request->input('icon', false)) {
            if (!$competition->icon || $request->input('icon') !== $competition->icon->file_name) {
                if ($competition->icon) {
                    $competition->icon->delete();
                }
                $competition->addMedia(storage_path('tmp/uploads/' . basename($request->input('icon'))))->toMediaCollection('icon');
            }
        } elseif ($competition->icon) {
            $competition->icon->delete();
        }

        return redirect()->route('admin.competitions.index');
    }

    public function show(Competition $competition)
    {
        abort_if(Gate::denies('competition_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.competitions.show', compact('competition'));
    }

    public function destroy(Competition $competition)
    {
        abort_if(Gate::denies('competition_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $competition->delete();

        return back();
    }

    public function massDestroy(MassDestroyCompetitionRequest $request)
    {
        Competition::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('competition_create') && Gate::denies('competition_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Competition();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
