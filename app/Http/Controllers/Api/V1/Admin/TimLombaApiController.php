<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreTimLombaRequest;
use App\Http\Requests\UpdateTimLombaRequest;
use App\Http\Resources\Admin\TimLombaResource;
use App\Models\TimLomba;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TimLombaApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('tim_lomba_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TimLombaResource(TimLomba::with(['ketua'])->get());
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

        return (new TimLombaResource($timLomba))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(TimLomba $timLomba)
    {
        abort_if(Gate::denies('tim_lomba_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TimLombaResource($timLomba->load(['ketua']));
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

        return (new TimLombaResource($timLomba))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(TimLomba $timLomba)
    {
        abort_if(Gate::denies('tim_lomba_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $timLomba->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
