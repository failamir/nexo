<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StorePembayaranRequest;
use App\Http\Requests\UpdatePembayaranRequest;
use App\Http\Resources\Admin\PembayaranResource;
use App\Models\Pembayaran;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PembayaranApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('pembayaran_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PembayaranResource(Pembayaran::with(['ketua', 'competition'])->get());
    }

    public function store(StorePembayaranRequest $request)
    {
        $pembayaran = Pembayaran::create($request->all());

        if ($request->input('bukti_pembayaran', false)) {
            $pembayaran->addMedia(storage_path('tmp/uploads/' . basename($request->input('bukti_pembayaran'))))->toMediaCollection('bukti_pembayaran');
        }

        return (new PembayaranResource($pembayaran))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Pembayaran $pembayaran)
    {
        abort_if(Gate::denies('pembayaran_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PembayaranResource($pembayaran->load(['ketua', 'competition']));
    }

    public function update(UpdatePembayaranRequest $request, Pembayaran $pembayaran)
    {
        $pembayaran->update($request->all());

        if ($request->input('bukti_pembayaran', false)) {
            if (!$pembayaran->bukti_pembayaran || $request->input('bukti_pembayaran') !== $pembayaran->bukti_pembayaran->file_name) {
                if ($pembayaran->bukti_pembayaran) {
                    $pembayaran->bukti_pembayaran->delete();
                }
                $pembayaran->addMedia(storage_path('tmp/uploads/' . basename($request->input('bukti_pembayaran'))))->toMediaCollection('bukti_pembayaran');
            }
        } elseif ($pembayaran->bukti_pembayaran) {
            $pembayaran->bukti_pembayaran->delete();
        }

        return (new PembayaranResource($pembayaran))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Pembayaran $pembayaran)
    {
        abort_if(Gate::denies('pembayaran_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pembayaran->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
