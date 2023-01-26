<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPembayaranRequest;
use App\Http\Requests\StorePembayaranRequest;
use App\Http\Requests\UpdatePembayaranRequest;
use App\Models\Competition;
use App\Models\Pembayaran;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PembayaranController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('pembayaran_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pembayarans = Pembayaran::with(['ketua', 'competition', 'media'])->get();

        return view('admin.pembayarans.index', compact('pembayarans'));
    }

    public function create()
    {
        abort_if(Gate::denies('pembayaran_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ketuas = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $competitions = Competition::pluck('nama_lomba', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.pembayarans.create', compact('competitions', 'ketuas'));
    }

    public function store(StorePembayaranRequest $request)
    {
        $pembayaran = Pembayaran::create($request->all());

        if ($request->input('bukti_pembayaran', false)) {
            $pembayaran->addMedia(storage_path('tmp/uploads/' . basename($request->input('bukti_pembayaran'))))->toMediaCollection('bukti_pembayaran');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $pembayaran->id]);
        }

        return redirect()->route('admin.pembayarans.index');
    }

    public function edit(Pembayaran $pembayaran)
    {
        abort_if(Gate::denies('pembayaran_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ketuas = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $competitions = Competition::pluck('nama_lomba', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pembayaran->load('ketua', 'competition');

        return view('admin.pembayarans.edit', compact('competitions', 'ketuas', 'pembayaran'));
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

        return redirect()->route('admin.pembayarans.index');
    }

    public function show(Pembayaran $pembayaran)
    {
        abort_if(Gate::denies('pembayaran_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pembayaran->load('ketua', 'competition');

        return view('admin.pembayarans.show', compact('pembayaran'));
    }

    public function destroy(Pembayaran $pembayaran)
    {
        abort_if(Gate::denies('pembayaran_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pembayaran->delete();

        return back();
    }

    public function massDestroy(MassDestroyPembayaranRequest $request)
    {
        Pembayaran::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('pembayaran_create') && Gate::denies('pembayaran_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Pembayaran();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
