@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.competition.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.competitions.update", [$competition->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="nama_lomba">{{ trans('cruds.competition.fields.nama_lomba') }}</label>
                <input class="form-control {{ $errors->has('nama_lomba') ? 'is-invalid' : '' }}" type="text" name="nama_lomba" id="nama_lomba" value="{{ old('nama_lomba', $competition->nama_lomba) }}">
                @if($errors->has('nama_lomba'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nama_lomba') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.competition.fields.nama_lomba_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.competition.fields.category') }}</label>
                <select class="form-control {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category" id="category">
                    <option value disabled {{ old('category', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Competition::CATEGORY_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('category', $competition->category) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('category'))
                    <div class="invalid-feedback">
                        {{ $errors->first('category') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.competition.fields.category_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="jumlah_submission">{{ trans('cruds.competition.fields.jumlah_submission') }}</label>
                <input class="form-control {{ $errors->has('jumlah_submission') ? 'is-invalid' : '' }}" type="number" name="jumlah_submission" id="jumlah_submission" value="{{ old('jumlah_submission', $competition->jumlah_submission) }}" step="1">
                @if($errors->has('jumlah_submission'))
                    <div class="invalid-feedback">
                        {{ $errors->first('jumlah_submission') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.competition.fields.jumlah_submission_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="biaya">{{ trans('cruds.competition.fields.biaya') }}</label>
                <input class="form-control {{ $errors->has('biaya') ? 'is-invalid' : '' }}" type="number" name="biaya" id="biaya" value="{{ old('biaya', $competition->biaya) }}" step="1">
                @if($errors->has('biaya'))
                    <div class="invalid-feedback">
                        {{ $errors->first('biaya') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.competition.fields.biaya_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tanggal_mulai">{{ trans('cruds.competition.fields.tanggal_mulai') }}</label>
                <input class="form-control datetime {{ $errors->has('tanggal_mulai') ? 'is-invalid' : '' }}" type="text" name="tanggal_mulai" id="tanggal_mulai" value="{{ old('tanggal_mulai', $competition->tanggal_mulai) }}">
                @if($errors->has('tanggal_mulai'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tanggal_mulai') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.competition.fields.tanggal_mulai_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tanggal_selesai">{{ trans('cruds.competition.fields.tanggal_selesai') }}</label>
                <input class="form-control {{ $errors->has('tanggal_selesai') ? 'is-invalid' : '' }}" type="text" name="tanggal_selesai" id="tanggal_selesai" value="{{ old('tanggal_selesai', $competition->tanggal_selesai) }}">
                @if($errors->has('tanggal_selesai'))
                    <div class="invalid-feedback">
                        {{ $errors->first('tanggal_selesai') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.competition.fields.tanggal_selesai_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="icon">{{ trans('cruds.competition.fields.icon') }}</label>
                <div class="needsclick dropzone {{ $errors->has('icon') ? 'is-invalid' : '' }}" id="icon-dropzone">
                </div>
                @if($errors->has('icon'))
                    <div class="invalid-feedback">
                        {{ $errors->first('icon') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.competition.fields.icon_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.iconDropzone = {
    url: '{{ route('admin.competitions.storeMedia') }}',
    maxFilesize: 20, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 20,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="icon"]').remove()
      $('form').append('<input type="hidden" name="icon" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="icon"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($competition) && $competition->icon)
      var file = {!! json_encode($competition->icon) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="icon" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
@endsection