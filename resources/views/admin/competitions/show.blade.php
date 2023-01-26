@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.competition.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.competitions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.competition.fields.id') }}
                        </th>
                        <td>
                            {{ $competition->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.competition.fields.nama_lomba') }}
                        </th>
                        <td>
                            {{ $competition->nama_lomba }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.competition.fields.category') }}
                        </th>
                        <td>
                            {{ App\Models\Competition::CATEGORY_SELECT[$competition->category] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.competition.fields.jumlah_submission') }}
                        </th>
                        <td>
                            {{ $competition->jumlah_submission }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.competition.fields.biaya') }}
                        </th>
                        <td>
                            {{ $competition->biaya }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.competition.fields.tanggal_mulai') }}
                        </th>
                        <td>
                            {{ $competition->tanggal_mulai }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.competition.fields.tanggal_selesai') }}
                        </th>
                        <td>
                            {{ $competition->tanggal_selesai }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.competition.fields.icon') }}
                        </th>
                        <td>
                            @if($competition->icon)
                                <a href="{{ $competition->icon->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $competition->icon->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.competitions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection