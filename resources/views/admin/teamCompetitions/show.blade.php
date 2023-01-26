@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.teamCompetition.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.team-competitions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.teamCompetition.fields.id') }}
                        </th>
                        <td>
                            {{ $teamCompetition->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teamCompetition.fields.tim') }}
                        </th>
                        <td>
                            @foreach($teamCompetition->tims as $key => $tim)
                                <span class="label label-info">{{ $tim->nama_tim }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teamCompetition.fields.competition') }}
                        </th>
                        <td>
                            @foreach($teamCompetition->competitions as $key => $competition)
                                <span class="label label-info">{{ $competition->nama_lomba }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.teamCompetition.fields.pembayaran') }}
                        </th>
                        <td>
                            {{ $teamCompetition->pembayaran->status_pembayaran ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.team-competitions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection