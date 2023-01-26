@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.timLomba.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tim-lombas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.timLomba.fields.id') }}
                        </th>
                        <td>
                            {{ $timLomba->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timLomba.fields.ketua') }}
                        </th>
                        <td>
                            {{ $timLomba->ketua->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timLomba.fields.nama_tim') }}
                        </th>
                        <td>
                            {{ $timLomba->nama_tim }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timLomba.fields.institusi') }}
                        </th>
                        <td>
                            {{ $timLomba->institusi }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timLomba.fields.nomor_kontak_1') }}
                        </th>
                        <td>
                            {{ $timLomba->nomor_kontak_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timLomba.fields.nomor_kontak_2') }}
                        </th>
                        <td>
                            {{ $timLomba->nomor_kontak_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timLomba.fields.nama_anggota_1') }}
                        </th>
                        <td>
                            {{ $timLomba->nama_anggota_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timLomba.fields.email_anggota_1') }}
                        </th>
                        <td>
                            {{ $timLomba->email_anggota_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timLomba.fields.foto_anggota_1') }}
                        </th>
                        <td>
                            @if($timLomba->foto_anggota_1)
                                <a href="{{ $timLomba->foto_anggota_1->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $timLomba->foto_anggota_1->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timLomba.fields.e_ktm_anggota_1') }}
                        </th>
                        <td>
                            @if($timLomba->e_ktm_anggota_1)
                                <a href="{{ $timLomba->e_ktm_anggota_1->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $timLomba->e_ktm_anggota_1->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timLomba.fields.bukti_anggota_1') }}
                        </th>
                        <td>
                            @if($timLomba->bukti_anggota_1)
                                <a href="{{ $timLomba->bukti_anggota_1->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $timLomba->bukti_anggota_1->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timLomba.fields.nama_anggota_2') }}
                        </th>
                        <td>
                            {{ $timLomba->nama_anggota_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timLomba.fields.email_anggota_2') }}
                        </th>
                        <td>
                            {{ $timLomba->email_anggota_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timLomba.fields.foto_anggota_2') }}
                        </th>
                        <td>
                            @if($timLomba->foto_anggota_2)
                                <a href="{{ $timLomba->foto_anggota_2->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $timLomba->foto_anggota_2->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timLomba.fields.e_ktm_anggota_2') }}
                        </th>
                        <td>
                            @if($timLomba->e_ktm_anggota_2)
                                <a href="{{ $timLomba->e_ktm_anggota_2->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $timLomba->e_ktm_anggota_2->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timLomba.fields.bukti_anggota_2') }}
                        </th>
                        <td>
                            @if($timLomba->bukti_anggota_2)
                                <a href="{{ $timLomba->bukti_anggota_2->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $timLomba->bukti_anggota_2->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timLomba.fields.nama_anggota_3') }}
                        </th>
                        <td>
                            {{ $timLomba->nama_anggota_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timLomba.fields.email_anggota_3') }}
                        </th>
                        <td>
                            {{ $timLomba->email_anggota_3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timLomba.fields.foto_anggota_3') }}
                        </th>
                        <td>
                            @if($timLomba->foto_anggota_3)
                                <a href="{{ $timLomba->foto_anggota_3->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $timLomba->foto_anggota_3->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timLomba.fields.e_ktm_anggota_3') }}
                        </th>
                        <td>
                            @if($timLomba->e_ktm_anggota_3)
                                <a href="{{ $timLomba->e_ktm_anggota_3->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $timLomba->e_ktm_anggota_3->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timLomba.fields.bukti_anggota_3') }}
                        </th>
                        <td>
                            @if($timLomba->bukti_anggota_3)
                                <a href="{{ $timLomba->bukti_anggota_3->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $timLomba->bukti_anggota_3->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timLomba.fields.nama_anggota_4') }}
                        </th>
                        <td>
                            {{ $timLomba->nama_anggota_4 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timLomba.fields.email_anggota_4') }}
                        </th>
                        <td>
                            {{ $timLomba->email_anggota_4 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timLomba.fields.foto_anggota_4') }}
                        </th>
                        <td>
                            @if($timLomba->foto_anggota_4)
                                <a href="{{ $timLomba->foto_anggota_4->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $timLomba->foto_anggota_4->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timLomba.fields.e_ktm_anggota_4') }}
                        </th>
                        <td>
                            @if($timLomba->e_ktm_anggota_4)
                                <a href="{{ $timLomba->e_ktm_anggota_4->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $timLomba->e_ktm_anggota_4->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timLomba.fields.bukti_anggota_4') }}
                        </th>
                        <td>
                            @if($timLomba->bukti_anggota_4)
                                <a href="{{ $timLomba->bukti_anggota_4->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $timLomba->bukti_anggota_4->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timLomba.fields.simpan_permanen') }}
                        </th>
                        <td>
                            {{ $timLomba->simpan_permanen }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.timLomba.fields.bukti_pembayaran') }}
                        </th>
                        <td>
                            @if($timLomba->bukti_pembayaran)
                                <a href="{{ $timLomba->bukti_pembayaran->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $timLomba->bukti_pembayaran->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.tim-lombas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection