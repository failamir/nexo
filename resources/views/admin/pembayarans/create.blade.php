@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.pembayaran.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.pembayarans.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="ketua_id">{{ trans('cruds.pembayaran.fields.ketua') }}</label>
                <select class="form-control select2 {{ $errors->has('ketua') ? 'is-invalid' : '' }}" name="ketua_id" id="ketua_id">
                    @foreach($ketuas as $id => $entry)
                        <option value="{{ $id }}" {{ old('ketua_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('ketua'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ketua') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pembayaran.fields.ketua_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="competition_id">{{ trans('cruds.pembayaran.fields.competition') }}</label>
                <select class="form-control select2 {{ $errors->has('competition') ? 'is-invalid' : '' }}" name="competition_id" id="competition_id">
                    @foreach($competitions as $id => $entry)
                        <option value="{{ $id }}" {{ old('competition_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('competition'))
                    <div class="invalid-feedback">
                        {{ $errors->first('competition') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pembayaran.fields.competition_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bukti_pembayaran">{{ trans('cruds.pembayaran.fields.bukti_pembayaran') }}</label>
                <div class="needsclick dropzone {{ $errors->has('bukti_pembayaran') ? 'is-invalid' : '' }}" id="bukti_pembayaran-dropzone">
                </div>
                @if($errors->has('bukti_pembayaran'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bukti_pembayaran') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pembayaran.fields.bukti_pembayaran_helper') }}</span>
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.pembayaran.fields.status_pembayaran') }}</label>
                <select class="form-control {{ $errors->has('status_pembayaran') ? 'is-invalid' : '' }}" name="status_pembayaran" id="status_pembayaran">
                    <option value disabled {{ old('status_pembayaran', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Pembayaran::STATUS_PEMBAYARAN_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status_pembayaran', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status_pembayaran'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status_pembayaran') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.pembayaran.fields.status_pembayaran_helper') }}</span>
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
    Dropzone.options.buktiPembayaranDropzone = {
    url: '{{ route('admin.pembayarans.storeMedia') }}',
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
      $('form').find('input[name="bukti_pembayaran"]').remove()
      $('form').append('<input type="hidden" name="bukti_pembayaran" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="bukti_pembayaran"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($pembayaran) && $pembayaran->bukti_pembayaran)
      var file = {!! json_encode($pembayaran->bukti_pembayaran) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="bukti_pembayaran" value="' + file.file_name + '">')
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