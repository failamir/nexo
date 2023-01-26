<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreCompetitionRequest;
use App\Http\Requests\UpdateCompetitionRequest;
use App\Http\Resources\Admin\CompetitionResource;
use App\Models\Competition;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CompetitionApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('competition_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CompetitionResource(Competition::all());
    }

    public function store(StoreCompetitionRequest $request)
    {
        $competition = Competition::create($request->all());

        if ($request->input('icon', false)) {
            $competition->addMedia(storage_path('tmp/uploads/' . basename($request->input('icon'))))->toMediaCollection('icon');
        }

        return (new CompetitionResource($competition))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Competition $competition)
    {
        abort_if(Gate::denies('competition_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CompetitionResource($competition);
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

        return (new CompetitionResource($competition))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Competition $competition)
    {
        abort_if(Gate::denies('competition_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $competition->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
