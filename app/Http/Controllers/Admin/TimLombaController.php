<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyTimLombaRequest;
use App\Http\Requests\StoreTimLombaRequest;
use App\Http\Requests\UpdateTimLombaRequest;
use App\Models\TimLomba;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class TimLombaController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('tim_lomba_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $timLombas = TimLomba::with(['ketua', 'media'])->get();

        return view('admin.timLombas.index', compact('timLombas'));
    }

    public function create()
    {
        abort_if(Gate::denies('tim_lomba_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ketuas = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.timLombas.create', compact('ketuas'));
    }

    public function store(StoreTimLombaRequest $request)
    {
        $timLomba = TimLomba::create($request->all());

        if ($request->input('foto_anggota_1', false)) {
            $timLomba->addMedia(storage_path('tmp/uploads/' . basename($request->input('foto_anggota_1'))))->toMediaCollection('foto_anggota_1');
        }

        if ($request->input('e_ktm_anggota_1', false)) {
            $timLomba->addMedia(storage_path('tmp/uploads/' . basename($request->input('e_ktm_anggota_1'))))->toMediaCollection('e_ktm_anggota_1');
        }

        if ($request->input('bukti_anggota_1', false)) {
            $timLomba->addMedia(storage_path('tmp/uploads/' . basename($request->input('bukti_anggota_1'))))->toMediaCollection('bukti_anggota_1');
        }

        if ($request->input('foto_anggota_2', false)) {
            $timLomba->addMedia(storage_path('tmp/uploads/' . basename($request->input('foto_anggota_2'))))->toMediaCollection('foto_anggota_2');
        }

        if ($request->input('e_ktm_anggota_2', false)) {
            $timLomba->addMedia(storage_path('tmp/uploads/' . basename($request->input('e_ktm_anggota_2'))))->toMediaCollection('e_ktm_anggota_2');
        }

        if ($request->input('bukti_anggota_2', false)) {
            $timLomba->addMedia(storage_path('tmp/uploads/' . basename($request->input('bukti_anggota_2'))))->toMediaCollection('bukti_anggota_2');
        }

        if ($request->input('foto_anggota_3', false)) {
            $timLomba->addMedia(storage_path('tmp/uploads/' . basename($request->input('foto_anggota_3'))))->toMediaCollection('foto_anggota_3');
        }

        if ($request->input('e_ktm_anggota_3', false)) {
            $timLomba->addMedia(storage_path('tmp/uploads/' . basename($request->input('e_ktm_anggota_3'))))->toMediaCollection('e_ktm_anggota_3');
        }

        if ($request->input('bukti_anggota_3', false)) {
            $timLomba->addMedia(storage_path('tmp/uploads/' . basename($request->input('bukti_anggota_3'))))->toMediaCollection('bukti_anggota_3');
        }

        if ($request->input('foto_anggota_4', false)) {
            $timLomba->addMedia(storage_path('tmp/uploads/' . basename($request->input('foto_anggota_4'))))->toMediaCollection('foto_anggota_4');
        }

        if ($request->input('e_ktm_anggota_4', false)) {
            $timLomba->addMedia(storage_path('tmp/uploads/' . basename($request->input('e_ktm_anggota_4'))))->toMediaCollection('e_ktm_anggota_4');
        }

        if ($request->input('bukti_anggota_4', false)) {
            $timLomba->addMedia(storage_path('tmp/uploads/' . basename($request->input('bukti_anggota_4'))))->toMediaCollection('bukti_anggota_4');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $timLomba->id]);
        }

        return redirect()->route('admin.tim-lombas.index');
    }

    public function edit(TimLomba $timLomba)
    {
        abort_if(Gate::denies('tim_lomba_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ketuas = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $timLomba->load('ketua');

        return view('admin.timLombas.edit', compact('ketuas', 'timLomba'));
    }

    public function update(UpdateTimLombaRequest $request, TimLomba $timLomba)
    {
        $timLomba->update($request->all());

        if ($request->input('foto_anggota_1', false)) {
            if (!$timLomba->foto_anggota_1 || $request->input('foto_anggota_1') !== $timLomba->foto_anggota_1->file_name) {
                if ($timLomba->foto_anggota_1) {
                    $timLomba->foto_anggota_1->delete();
                }
                $timLomba->addMedia(storage_path('tmp/uploads/' . basename($request->input('foto_anggota_1'))))->toMediaCollection('foto_anggota_1');
            }
        } elseif ($timLomba->foto_anggota_1) {
            $timLomba->foto_anggota_1->delete();
        }

        if ($request->input('e_ktm_anggota_1', false)) {
            if (!$timLomba->e_ktm_anggota_1 || $request->input('e_ktm_anggota_1') !== $timLomba->e_ktm_anggota_1->file_name) {
                if ($timLomba->e_ktm_anggota_1) {
                    $timLomba->e_ktm_anggota_1->delete();
                }
                $timLomba->addMedia(storage_path('tmp/uploads/' . basename($request->input('e_ktm_anggota_1'))))->toMediaCollection('e_ktm_anggota_1');
            }
        } elseif ($timLomba->e_ktm_anggota_1) {
            $timLomba->e_ktm_anggota_1->delete();
        }

        if ($request->input('bukti_anggota_1', false)) {
            if (!$timLomba->bukti_anggota_1 || $request->input('bukti_anggota_1') !== $timLomba->bukti_anggota_1->file_name) {
                if ($timLomba->bukti_anggota_1) {
                    $timLomba->bukti_anggota_1->delete();
                }
                $timLomba->addMedia(storage_path('tmp/uploads/' . basename($request->input('bukti_anggota_1'))))->toMediaCollection('bukti_anggota_1');
            }
        } elseif ($timLomba->bukti_anggota_1) {
            $timLomba->bukti_anggota_1->delete();
        }

        if ($request->input('foto_anggota_2', false)) {
            if (!$timLomba->foto_anggota_2 || $request->input('foto_anggota_2') !== $timLomba->foto_anggota_2->file_name) {
                if ($timLomba->foto_anggota_2) {
                    $timLomba->foto_anggota_2->delete();
                }
                $timLomba->addMedia(storage_path('tmp/uploads/' . basename($request->input('foto_anggota_2'))))->toMediaCollection('foto_anggota_2');
            }
        } elseif ($timLomba->foto_anggota_2) {
            $timLomba->foto_anggota_2->delete();
        }

        if ($request->input('e_ktm_anggota_2', false)) {
            if (!$timLomba->e_ktm_anggota_2 || $request->input('e_ktm_anggota_2') !== $timLomba->e_ktm_anggota_2->file_name) {
                if ($timLomba->e_ktm_anggota_2) {
                    $timLomba->e_ktm_anggota_2->delete();
                }
                $timLomba->addMedia(storage_path('tmp/uploads/' . basename($request->input('e_ktm_anggota_2'))))->toMediaCollection('e_ktm_anggota_2');
            }
        } elseif ($timLomba->e_ktm_anggota_2) {
            $timLomba->e_ktm_anggota_2->delete();
        }

        if ($request->input('bukti_anggota_2', false)) {
            if (!$timLomba->bukti_anggota_2 || $request->input('bukti_anggota_2') !== $timLomba->bukti_anggota_2->file_name) {
                if ($timLomba->bukti_anggota_2) {
                    $timLomba->bukti_anggota_2->delete();
                }
                $timLomba->addMedia(storage_path('tmp/uploads/' . basename($request->input('bukti_anggota_2'))))->toMediaCollection('bukti_anggota_2');
            }
        } elseif ($timLomba->bukti_anggota_2) {
            $timLomba->bukti_anggota_2->delete();
        }

        if ($request->input('foto_anggota_3', false)) {
            if (!$timLomba->foto_anggota_3 || $request->input('foto_anggota_3') !== $timLomba->foto_anggota_3->file_name) {
                if ($timLomba->foto_anggota_3) {
                    $timLomba->foto_anggota_3->delete();
                }
                $timLomba->addMedia(storage_path('tmp/uploads/' . basename($request->input('foto_anggota_3'))))->toMediaCollection('foto_anggota_3');
            }
        } elseif ($timLomba->foto_anggota_3) {
            $timLomba->foto_anggota_3->delete();
        }

        if ($request->input('e_ktm_anggota_3', false)) {
            if (!$timLomba->e_ktm_anggota_3 || $request->input('e_ktm_anggota_3') !== $timLomba->e_ktm_anggota_3->file_name) {
                if ($timLomba->e_ktm_anggota_3) {
                    $timLomba->e_ktm_anggota_3->delete();
                }
                $timLomba->addMedia(storage_path('tmp/uploads/' . basename($request->input('e_ktm_anggota_3'))))->toMediaCollection('e_ktm_anggota_3');
            }
        } elseif ($timLomba->e_ktm_anggota_3) {
            $timLomba->e_ktm_anggota_3->delete();
        }

        if ($request->input('bukti_anggota_3', false)) {
            if (!$timLomba->bukti_anggota_3 || $request->input('bukti_anggota_3') !== $timLomba->bukti_anggota_3->file_name) {
                if ($timLomba->bukti_anggota_3) {
                    $timLomba->bukti_anggota_3->delete();
                }
                $timLomba->addMedia(storage_path('tmp/uploads/' . basename($request->input('bukti_anggota_3'))))->toMediaCollection('bukti_anggota_3');
            }
        } elseif ($timLomba->bukti_anggota_3) {
            $timLomba->bukti_anggota_3->delete();
        }

        if ($request->input('foto_anggota_4', false)) {
            if (!$timLomba->foto_anggota_4 || $request->input('foto_anggota_4') !== $timLomba->foto_anggota_4->file_name) {
                if ($timLomba->foto_anggota_4) {
                    $timLomba->foto_anggota_4->delete();
                }
                $timLomba->addMedia(storage_path('tmp/uploads/' . basename($request->input('foto_anggota_4'))))->toMediaCollection('foto_anggota_4');
            }
        } elseif ($timLomba->foto_anggota_4) {
            $timLomba->foto_anggota_4->delete();
        }

        if ($request->input('e_ktm_anggota_4', false)) {
            if (!$timLomba->e_ktm_anggota_4 || $request->input('e_ktm_anggota_4') !== $timLomba->e_ktm_anggota_4->file_name) {
                if ($timLomba->e_ktm_anggota_4) {
                    $timLomba->e_ktm_anggota_4->delete();
                }
                $timLomba->addMedia(storage_path('tmp/uploads/' . basename($request->input('e_ktm_anggota_4'))))->toMediaCollection('e_ktm_anggota_4');
            }
        } elseif ($timLomba->e_ktm_anggota_4) {
            $timLomba->e_ktm_anggota_4->delete();
        }

        if ($request->input('bukti_anggota_4', false)) {
            if (!$timLomba->bukti_anggota_4 || $request->input('bukti_anggota_4') !== $timLomba->bukti_anggota_4->file_name) {
                if ($timLomba->bukti_anggota_4) {
                    $timLomba->bukti_anggota_4->delete();
                }
                $timLomba->addMedia(storage_path('tmp/uploads/' . basename($request->input('bukti_anggota_4'))))->toMediaCollection('bukti_anggota_4');
            }
        } elseif ($timLomba->bukti_anggota_4) {
            $timLomba->bukti_anggota_4->delete();
        }

        return redirect()->route('admin.tim-lombas.index');
    }

    public function show(TimLomba $timLomba)
    {
        abort_if(Gate::denies('tim_lomba_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $timLomba->load('ketua');

        return view('admin.timLombas.show', compact('timLomba'));
    }

    public function destroy(TimLomba $timLomba)
    {
        abort_if(Gate::denies('tim_lomba_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $timLomba->delete();

        return back();
    }

    public function massDestroy(MassDestroyTimLombaRequest $request)
    {
        TimLomba::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('tim_lomba_create') && Gate::denies('tim_lomba_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new TimLomba();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
