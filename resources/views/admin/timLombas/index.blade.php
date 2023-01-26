@extends('layouts.admin')
@section('content')
@can('tim_lomba_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.tim-lombas.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.timLomba.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.timLomba.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-TimLomba">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.timLomba.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.timLomba.fields.ketua') }}
                        </th>
                        <th>
                            {{ trans('cruds.timLomba.fields.nama_tim') }}
                        </th>
                        <th>
                            {{ trans('cruds.timLomba.fields.institusi') }}
                        </th>
                        <th>
                            {{ trans('cruds.timLomba.fields.nomor_kontak_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.timLomba.fields.nomor_kontak_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.timLomba.fields.nama_anggota_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.timLomba.fields.email_anggota_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.timLomba.fields.foto_anggota_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.timLomba.fields.e_ktm_anggota_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.timLomba.fields.bukti_anggota_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.timLomba.fields.nama_anggota_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.timLomba.fields.email_anggota_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.timLomba.fields.foto_anggota_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.timLomba.fields.e_ktm_anggota_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.timLomba.fields.bukti_anggota_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.timLomba.fields.nama_anggota_3') }}
                        </th>
                        <th>
                            {{ trans('cruds.timLomba.fields.email_anggota_3') }}
                        </th>
                        <th>
                            {{ trans('cruds.timLomba.fields.foto_anggota_3') }}
                        </th>
                        <th>
                            {{ trans('cruds.timLomba.fields.e_ktm_anggota_3') }}
                        </th>
                        <th>
                            {{ trans('cruds.timLomba.fields.bukti_anggota_3') }}
                        </th>
                        <th>
                            {{ trans('cruds.timLomba.fields.nama_anggota_4') }}
                        </th>
                        <th>
                            {{ trans('cruds.timLomba.fields.email_anggota_4') }}
                        </th>
                        <th>
                            {{ trans('cruds.timLomba.fields.foto_anggota_4') }}
                        </th>
                        <th>
                            {{ trans('cruds.timLomba.fields.e_ktm_anggota_4') }}
                        </th>
                        <th>
                            {{ trans('cruds.timLomba.fields.bukti_anggota_4') }}
                        </th>
                        <th>
                            {{ trans('cruds.timLomba.fields.simpan_permanen') }}
                        </th>
                        <th>
                            {{ trans('cruds.timLomba.fields.bukti_pembayaran') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($timLombas as $key => $timLomba)
                        <tr data-entry-id="{{ $timLomba->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $timLomba->id ?? '' }}
                            </td>
                            <td>
                                {{ $timLomba->ketua->name ?? '' }}
                            </td>
                            <td>
                                {{ $timLomba->nama_tim ?? '' }}
                            </td>
                            <td>
                                {{ $timLomba->institusi ?? '' }}
                            </td>
                            <td>
                                {{ $timLomba->nomor_kontak_1 ?? '' }}
                            </td>
                            <td>
                                {{ $timLomba->nomor_kontak_2 ?? '' }}
                            </td>
                            <td>
                                {{ $timLomba->nama_anggota_1 ?? '' }}
                            </td>
                            <td>
                                {{ $timLomba->email_anggota_1 ?? '' }}
                            </td>
                            <td>
                                @if($timLomba->foto_anggota_1)
                                    <a href="{{ $timLomba->foto_anggota_1->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $timLomba->foto_anggota_1->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($timLomba->e_ktm_anggota_1)
                                    <a href="{{ $timLomba->e_ktm_anggota_1->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $timLomba->e_ktm_anggota_1->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($timLomba->bukti_anggota_1)
                                    <a href="{{ $timLomba->bukti_anggota_1->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $timLomba->bukti_anggota_1->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $timLomba->nama_anggota_2 ?? '' }}
                            </td>
                            <td>
                                {{ $timLomba->email_anggota_2 ?? '' }}
                            </td>
                            <td>
                                @if($timLomba->foto_anggota_2)
                                    <a href="{{ $timLomba->foto_anggota_2->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $timLomba->foto_anggota_2->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($timLomba->e_ktm_anggota_2)
                                    <a href="{{ $timLomba->e_ktm_anggota_2->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $timLomba->e_ktm_anggota_2->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($timLomba->bukti_anggota_2)
                                    <a href="{{ $timLomba->bukti_anggota_2->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $timLomba->bukti_anggota_2->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $timLomba->nama_anggota_3 ?? '' }}
                            </td>
                            <td>
                                {{ $timLomba->email_anggota_3 ?? '' }}
                            </td>
                            <td>
                                @if($timLomba->foto_anggota_3)
                                    <a href="{{ $timLomba->foto_anggota_3->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $timLomba->foto_anggota_3->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($timLomba->e_ktm_anggota_3)
                                    <a href="{{ $timLomba->e_ktm_anggota_3->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $timLomba->e_ktm_anggota_3->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($timLomba->bukti_anggota_3)
                                    <a href="{{ $timLomba->bukti_anggota_3->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $timLomba->bukti_anggota_3->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $timLomba->nama_anggota_4 ?? '' }}
                            </td>
                            <td>
                                {{ $timLomba->email_anggota_4 ?? '' }}
                            </td>
                            <td>
                                @if($timLomba->foto_anggota_4)
                                    <a href="{{ $timLomba->foto_anggota_4->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $timLomba->foto_anggota_4->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($timLomba->e_ktm_anggota_4)
                                    <a href="{{ $timLomba->e_ktm_anggota_4->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $timLomba->e_ktm_anggota_4->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($timLomba->bukti_anggota_4)
                                    <a href="{{ $timLomba->bukti_anggota_4->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $timLomba->bukti_anggota_4->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $timLomba->simpan_permanen ?? '' }}
                            </td>
                            <td>
                                @if($timLomba->bukti_pembayaran)
                                    <a href="{{ $timLomba->bukti_pembayaran->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $timLomba->bukti_pembayaran->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @can('tim_lomba_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.tim-lombas.show', $timLomba->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('tim_lomba_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.tim-lombas.edit', $timLomba->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('tim_lomba_delete')
                                    <form action="{{ route('admin.tim-lombas.destroy', $timLomba->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('tim_lomba_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.tim-lombas.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-TimLomba:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection