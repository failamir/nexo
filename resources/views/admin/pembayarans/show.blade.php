@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.pembayaran.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pembayarans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.pembayaran.fields.id') }}
                        </th>
                        <td>
                            {{ $pembayaran->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pembayaran.fields.ketua') }}
                        </th>
                        <td>
                            {{ $pembayaran->ketua->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pembayaran.fields.competition') }}
                        </th>
                        <td>
                            {{ $pembayaran->competition->nama_lomba ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pembayaran.fields.bukti_pembayaran') }}
                        </th>
                        <td>
                            @if($pembayaran->bukti_pembayaran)
                                <a href="{{ $pembayaran->bukti_pembayaran->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $pembayaran->bukti_pembayaran->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.pembayaran.fields.status_pembayaran') }}
                        </th>
                        <td>
                            {{ App\Models\Pembayaran::STATUS_PEMBAYARAN_SELECT[$pembayaran->status_pembayaran] ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pembayarans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection