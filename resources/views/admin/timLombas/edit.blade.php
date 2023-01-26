@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.timLomba.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.tim-lombas.update", [$timLomba->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="ketua_id">{{ trans('cruds.timLomba.fields.ketua') }}</label>
                <select class="form-control select2 {{ $errors->has('ketua') ? 'is-invalid' : '' }}" name="ketua_id" id="ketua_id">
                    @foreach($ketuas as $id => $entry)
                        <option value="{{ $id }}" {{ (old('ketua_id') ? old('ketua_id') : $timLomba->ketua->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('ketua'))
                    <div class="invalid-feedback">
                        {{ $errors->first('ketua') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.timLomba.fields.ketua_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nama_tim">{{ trans('cruds.timLomba.fields.nama_tim') }}</label>
                <input class="form-control {{ $errors->has('nama_tim') ? 'is-invalid' : '' }}" type="text" name="nama_tim" id="nama_tim" value="{{ old('nama_tim', $timLomba->nama_tim) }}">
                @if($errors->has('nama_tim'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nama_tim') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.timLomba.fields.nama_tim_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="institusi">{{ trans('cruds.timLomba.fields.institusi') }}</label>
                <input class="form-control {{ $errors->has('institusi') ? 'is-invalid' : '' }}" type="text" name="institusi" id="institusi" value="{{ old('institusi', $timLomba->institusi) }}">
                @if($errors->has('institusi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('institusi') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.timLomba.fields.institusi_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nomor_kontak_1">{{ trans('cruds.timLomba.fields.nomor_kontak_1') }}</label>
                <input class="form-control {{ $errors->has('nomor_kontak_1') ? 'is-invalid' : '' }}" type="text" name="nomor_kontak_1" id="nomor_kontak_1" value="{{ old('nomor_kontak_1', $timLomba->nomor_kontak_1) }}">
                @if($errors->has('nomor_kontak_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nomor_kontak_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.timLomba.fields.nomor_kontak_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nomor_kontak_2">{{ trans('cruds.timLomba.fields.nomor_kontak_2') }}</label>
                <input class="form-control {{ $errors->has('nomor_kontak_2') ? 'is-invalid' : '' }}" type="text" name="nomor_kontak_2" id="nomor_kontak_2" value="{{ old('nomor_kontak_2', $timLomba->nomor_kontak_2) }}">
                @if($errors->has('nomor_kontak_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nomor_kontak_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.timLomba.fields.nomor_kontak_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nama_anggota_1">{{ trans('cruds.timLomba.fields.nama_anggota_1') }}</label>
                <input class="form-control {{ $errors->has('nama_anggota_1') ? 'is-invalid' : '' }}" type="text" name="nama_anggota_1" id="nama_anggota_1" value="{{ old('nama_anggota_1', $timLomba->nama_anggota_1) }}">
                @if($errors->has('nama_anggota_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nama_anggota_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.timLomba.fields.nama_anggota_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email_anggota_1">{{ trans('cruds.timLomba.fields.email_anggota_1') }}</label>
                <input class="form-control {{ $errors->has('email_anggota_1') ? 'is-invalid' : '' }}" type="email" name="email_anggota_1" id="email_anggota_1" value="{{ old('email_anggota_1', $timLomba->email_anggota_1) }}">
                @if($errors->has('email_anggota_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email_anggota_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.timLomba.fields.email_anggota_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="foto_anggota_1">{{ trans('cruds.timLomba.fields.foto_anggota_1') }}</label>
                <div class="needsclick dropzone {{ $errors->has('foto_anggota_1') ? 'is-invalid' : '' }}" id="foto_anggota_1-dropzone">
                </div>
                @if($errors->has('foto_anggota_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('foto_anggota_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.timLomba.fields.foto_anggota_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="e_ktm_anggota_1">{{ trans('cruds.timLomba.fields.e_ktm_anggota_1') }}</label>
                <div class="needsclick dropzone {{ $errors->has('e_ktm_anggota_1') ? 'is-invalid' : '' }}" id="e_ktm_anggota_1-dropzone">
                </div>
                @if($errors->has('e_ktm_anggota_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('e_ktm_anggota_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.timLomba.fields.e_ktm_anggota_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bukti_anggota_1">{{ trans('cruds.timLomba.fields.bukti_anggota_1') }}</label>
                <div class="needsclick dropzone {{ $errors->has('bukti_anggota_1') ? 'is-invalid' : '' }}" id="bukti_anggota_1-dropzone">
                </div>
                @if($errors->has('bukti_anggota_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bukti_anggota_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.timLomba.fields.bukti_anggota_1_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nama_anggota_2">{{ trans('cruds.timLomba.fields.nama_anggota_2') }}</label>
                <input class="form-control {{ $errors->has('nama_anggota_2') ? 'is-invalid' : '' }}" type="text" name="nama_anggota_2" id="nama_anggota_2" value="{{ old('nama_anggota_2', $timLomba->nama_anggota_2) }}">
                @if($errors->has('nama_anggota_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nama_anggota_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.timLomba.fields.nama_anggota_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email_anggota_2">{{ trans('cruds.timLomba.fields.email_anggota_2') }}</label>
                <input class="form-control {{ $errors->has('email_anggota_2') ? 'is-invalid' : '' }}" type="email" name="email_anggota_2" id="email_anggota_2" value="{{ old('email_anggota_2', $timLomba->email_anggota_2) }}">
                @if($errors->has('email_anggota_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email_anggota_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.timLomba.fields.email_anggota_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="foto_anggota_2">{{ trans('cruds.timLomba.fields.foto_anggota_2') }}</label>
                <div class="needsclick dropzone {{ $errors->has('foto_anggota_2') ? 'is-invalid' : '' }}" id="foto_anggota_2-dropzone">
                </div>
                @if($errors->has('foto_anggota_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('foto_anggota_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.timLomba.fields.foto_anggota_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="e_ktm_anggota_2">{{ trans('cruds.timLomba.fields.e_ktm_anggota_2') }}</label>
                <div class="needsclick dropzone {{ $errors->has('e_ktm_anggota_2') ? 'is-invalid' : '' }}" id="e_ktm_anggota_2-dropzone">
                </div>
                @if($errors->has('e_ktm_anggota_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('e_ktm_anggota_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.timLomba.fields.e_ktm_anggota_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bukti_anggota_2">{{ trans('cruds.timLomba.fields.bukti_anggota_2') }}</label>
                <div class="needsclick dropzone {{ $errors->has('bukti_anggota_2') ? 'is-invalid' : '' }}" id="bukti_anggota_2-dropzone">
                </div>
                @if($errors->has('bukti_anggota_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bukti_anggota_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.timLomba.fields.bukti_anggota_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nama_anggota_3">{{ trans('cruds.timLomba.fields.nama_anggota_3') }}</label>
                <input class="form-control {{ $errors->has('nama_anggota_3') ? 'is-invalid' : '' }}" type="text" name="nama_anggota_3" id="nama_anggota_3" value="{{ old('nama_anggota_3', $timLomba->nama_anggota_3) }}">
                @if($errors->has('nama_anggota_3'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nama_anggota_3') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.timLomba.fields.nama_anggota_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email_anggota_3">{{ trans('cruds.timLomba.fields.email_anggota_3') }}</label>
                <input class="form-control {{ $errors->has('email_anggota_3') ? 'is-invalid' : '' }}" type="email" name="email_anggota_3" id="email_anggota_3" value="{{ old('email_anggota_3', $timLomba->email_anggota_3) }}">
                @if($errors->has('email_anggota_3'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email_anggota_3') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.timLomba.fields.email_anggota_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="foto_anggota_3">{{ trans('cruds.timLomba.fields.foto_anggota_3') }}</label>
                <div class="needsclick dropzone {{ $errors->has('foto_anggota_3') ? 'is-invalid' : '' }}" id="foto_anggota_3-dropzone">
                </div>
                @if($errors->has('foto_anggota_3'))
                    <div class="invalid-feedback">
                        {{ $errors->first('foto_anggota_3') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.timLomba.fields.foto_anggota_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="e_ktm_anggota_3">{{ trans('cruds.timLomba.fields.e_ktm_anggota_3') }}</label>
                <div class="needsclick dropzone {{ $errors->has('e_ktm_anggota_3') ? 'is-invalid' : '' }}" id="e_ktm_anggota_3-dropzone">
                </div>
                @if($errors->has('e_ktm_anggota_3'))
                    <div class="invalid-feedback">
                        {{ $errors->first('e_ktm_anggota_3') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.timLomba.fields.e_ktm_anggota_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bukti_anggota_3">{{ trans('cruds.timLomba.fields.bukti_anggota_3') }}</label>
                <div class="needsclick dropzone {{ $errors->has('bukti_anggota_3') ? 'is-invalid' : '' }}" id="bukti_anggota_3-dropzone">
                </div>
                @if($errors->has('bukti_anggota_3'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bukti_anggota_3') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.timLomba.fields.bukti_anggota_3_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="nama_anggota_4">{{ trans('cruds.timLomba.fields.nama_anggota_4') }}</label>
                <input class="form-control {{ $errors->has('nama_anggota_4') ? 'is-invalid' : '' }}" type="text" name="nama_anggota_4" id="nama_anggota_4" value="{{ old('nama_anggota_4', $timLomba->nama_anggota_4) }}">
                @if($errors->has('nama_anggota_4'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nama_anggota_4') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.timLomba.fields.nama_anggota_4_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email_anggota_4">{{ trans('cruds.timLomba.fields.email_anggota_4') }}</label>
                <input class="form-control {{ $errors->has('email_anggota_4') ? 'is-invalid' : '' }}" type="text" name="email_anggota_4" id="email_anggota_4" value="{{ old('email_anggota_4', $timLomba->email_anggota_4) }}">
                @if($errors->has('email_anggota_4'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email_anggota_4') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.timLomba.fields.email_anggota_4_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="foto_anggota_4">{{ trans('cruds.timLomba.fields.foto_anggota_4') }}</label>
                <div class="needsclick dropzone {{ $errors->has('foto_anggota_4') ? 'is-invalid' : '' }}" id="foto_anggota_4-dropzone">
                </div>
                @if($errors->has('foto_anggota_4'))
                    <div class="invalid-feedback">
                        {{ $errors->first('foto_anggota_4') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.timLomba.fields.foto_anggota_4_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="e_ktm_anggota_4">{{ trans('cruds.timLomba.fields.e_ktm_anggota_4') }}</label>
                <div class="needsclick dropzone {{ $errors->has('e_ktm_anggota_4') ? 'is-invalid' : '' }}" id="e_ktm_anggota_4-dropzone">
                </div>
                @if($errors->has('e_ktm_anggota_4'))
                    <div class="invalid-feedback">
                        {{ $errors->first('e_ktm_anggota_4') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.timLomba.fields.e_ktm_anggota_4_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bukti_anggota_4">{{ trans('cruds.timLomba.fields.bukti_anggota_4') }}</label>
                <div class="needsclick dropzone {{ $errors->has('bukti_anggota_4') ? 'is-invalid' : '' }}" id="bukti_anggota_4-dropzone">
                </div>
                @if($errors->has('bukti_anggota_4'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bukti_anggota_4') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.timLomba.fields.bukti_anggota_4_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="simpan_permanen">{{ trans('cruds.timLomba.fields.simpan_permanen') }}</label>
                <input class="form-control {{ $errors->has('simpan_permanen') ? 'is-invalid' : '' }}" type="number" name="simpan_permanen" id="simpan_permanen" value="{{ old('simpan_permanen', $timLomba->simpan_permanen) }}" step="1">
                @if($errors->has('simpan_permanen'))
                    <div class="invalid-feedback">
                        {{ $errors->first('simpan_permanen') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.timLomba.fields.simpan_permanen_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bukti_pembayaran">{{ trans('cruds.timLomba.fields.bukti_pembayaran') }}</label>
                <div class="needsclick dropzone {{ $errors->has('bukti_pembayaran') ? 'is-invalid' : '' }}" id="bukti_pembayaran-dropzone">
                </div>
                @if($errors->has('bukti_pembayaran'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bukti_pembayaran') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.timLomba.fields.bukti_pembayaran_helper') }}</span>
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
    Dropzone.options.fotoAnggota1Dropzone = {
    url: '{{ route('admin.tim-lombas.storeMedia') }}',
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
      $('form').find('input[name="foto_anggota_1"]').remove()
      $('form').append('<input type="hidden" name="foto_anggota_1" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="foto_anggota_1"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($timLomba) && $timLomba->foto_anggota_1)
      var file = {!! json_encode($timLomba->foto_anggota_1) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="foto_anggota_1" value="' + file.file_name + '">')
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
<script>
    Dropzone.options.eKtmAnggota1Dropzone = {
    url: '{{ route('admin.tim-lombas.storeMedia') }}',
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
      $('form').find('input[name="e_ktm_anggota_1"]').remove()
      $('form').append('<input type="hidden" name="e_ktm_anggota_1" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="e_ktm_anggota_1"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($timLomba) && $timLomba->e_ktm_anggota_1)
      var file = {!! json_encode($timLomba->e_ktm_anggota_1) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="e_ktm_anggota_1" value="' + file.file_name + '">')
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
<script>
    Dropzone.options.buktiAnggota1Dropzone = {
    url: '{{ route('admin.tim-lombas.storeMedia') }}',
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
      $('form').find('input[name="bukti_anggota_1"]').remove()
      $('form').append('<input type="hidden" name="bukti_anggota_1" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="bukti_anggota_1"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($timLomba) && $timLomba->bukti_anggota_1)
      var file = {!! json_encode($timLomba->bukti_anggota_1) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="bukti_anggota_1" value="' + file.file_name + '">')
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
<script>
    Dropzone.options.fotoAnggota2Dropzone = {
    url: '{{ route('admin.tim-lombas.storeMedia') }}',
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
      $('form').find('input[name="foto_anggota_2"]').remove()
      $('form').append('<input type="hidden" name="foto_anggota_2" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="foto_anggota_2"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($timLomba) && $timLomba->foto_anggota_2)
      var file = {!! json_encode($timLomba->foto_anggota_2) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="foto_anggota_2" value="' + file.file_name + '">')
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
<script>
    Dropzone.options.eKtmAnggota2Dropzone = {
    url: '{{ route('admin.tim-lombas.storeMedia') }}',
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
      $('form').find('input[name="e_ktm_anggota_2"]').remove()
      $('form').append('<input type="hidden" name="e_ktm_anggota_2" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="e_ktm_anggota_2"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($timLomba) && $timLomba->e_ktm_anggota_2)
      var file = {!! json_encode($timLomba->e_ktm_anggota_2) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="e_ktm_anggota_2" value="' + file.file_name + '">')
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
<script>
    Dropzone.options.buktiAnggota2Dropzone = {
    url: '{{ route('admin.tim-lombas.storeMedia') }}',
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
      $('form').find('input[name="bukti_anggota_2"]').remove()
      $('form').append('<input type="hidden" name="bukti_anggota_2" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="bukti_anggota_2"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($timLomba) && $timLomba->bukti_anggota_2)
      var file = {!! json_encode($timLomba->bukti_anggota_2) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="bukti_anggota_2" value="' + file.file_name + '">')
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
<script>
    Dropzone.options.fotoAnggota3Dropzone = {
    url: '{{ route('admin.tim-lombas.storeMedia') }}',
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
      $('form').find('input[name="foto_anggota_3"]').remove()
      $('form').append('<input type="hidden" name="foto_anggota_3" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="foto_anggota_3"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($timLomba) && $timLomba->foto_anggota_3)
      var file = {!! json_encode($timLomba->foto_anggota_3) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="foto_anggota_3" value="' + file.file_name + '">')
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
<script>
    Dropzone.options.eKtmAnggota3Dropzone = {
    url: '{{ route('admin.tim-lombas.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="e_ktm_anggota_3"]').remove()
      $('form').append('<input type="hidden" name="e_ktm_anggota_3" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="e_ktm_anggota_3"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($timLomba) && $timLomba->e_ktm_anggota_3)
      var file = {!! json_encode($timLomba->e_ktm_anggota_3) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="e_ktm_anggota_3" value="' + file.file_name + '">')
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
<script>
    Dropzone.options.buktiAnggota3Dropzone = {
    url: '{{ route('admin.tim-lombas.storeMedia') }}',
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
      $('form').find('input[name="bukti_anggota_3"]').remove()
      $('form').append('<input type="hidden" name="bukti_anggota_3" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="bukti_anggota_3"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($timLomba) && $timLomba->bukti_anggota_3)
      var file = {!! json_encode($timLomba->bukti_anggota_3) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="bukti_anggota_3" value="' + file.file_name + '">')
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
<script>
    Dropzone.options.fotoAnggota4Dropzone = {
    url: '{{ route('admin.tim-lombas.storeMedia') }}',
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
      $('form').find('input[name="foto_anggota_4"]').remove()
      $('form').append('<input type="hidden" name="foto_anggota_4" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="foto_anggota_4"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($timLomba) && $timLomba->foto_anggota_4)
      var file = {!! json_encode($timLomba->foto_anggota_4) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="foto_anggota_4" value="' + file.file_name + '">')
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
<script>
    Dropzone.options.eKtmAnggota4Dropzone = {
    url: '{{ route('admin.tim-lombas.storeMedia') }}',
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
      $('form').find('input[name="e_ktm_anggota_4"]').remove()
      $('form').append('<input type="hidden" name="e_ktm_anggota_4" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="e_ktm_anggota_4"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($timLomba) && $timLomba->e_ktm_anggota_4)
      var file = {!! json_encode($timLomba->e_ktm_anggota_4) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="e_ktm_anggota_4" value="' + file.file_name + '">')
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
<script>
    Dropzone.options.buktiAnggota4Dropzone = {
    url: '{{ route('admin.tim-lombas.storeMedia') }}',
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
      $('form').find('input[name="bukti_anggota_4"]').remove()
      $('form').append('<input type="hidden" name="bukti_anggota_4" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="bukti_anggota_4"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($timLomba) && $timLomba->bukti_anggota_4)
      var file = {!! json_encode($timLomba->bukti_anggota_4) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="bukti_anggota_4" value="' + file.file_name + '">')
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
<script>
    Dropzone.options.buktiPembayaranDropzone = {
    url: '{{ route('admin.tim-lombas.storeMedia') }}',
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
@if(isset($timLomba) && $timLomba->bukti_pembayaran)
      var file = {!! json_encode($timLomba->bukti_pembayaran) !!}
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
