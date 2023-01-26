@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.teamCompetition.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.team-competitions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="tims">{{ trans('cruds.teamCompetition.fields.tim') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('tims') ? 'is-invalid' : '' }}" name="tims[]" id="tims" multiple>
                    @foreach($tims as $id => $tim)
                        <option value="{{ $id }}" {{ in_array($id, old('tims', [])) ? 'selected' : '' }}>{{ $tim }}</option>
                    @endforeach
                </select>
                @if($errors->has('tims'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tims') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.teamCompetition.fields.tim_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="competitions">{{ trans('cruds.teamCompetition.fields.competition') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('competitions') ? 'is-invalid' : '' }}" name="competitions[]" id="competitions" multiple>
                    @foreach($competitions as $id => $competition)
                        <option value="{{ $id }}" {{ in_array($id, old('competitions', [])) ? 'selected' : '' }}>{{ $competition }}</option>
                    @endforeach
                </select>
                @if($errors->has('competitions'))
                    <div class="invalid-feedback">
                        {{ $errors->first('competitions') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.teamCompetition.fields.competition_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection