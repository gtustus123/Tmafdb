@extends('layouts.admin')
@section('content')
@can('pdbtm_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.pdbtms.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.pdbtm.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.pdbtm.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Pdbtm">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.pdbtm.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.pdbtm.fields.matrix') }}
                        </th>
                        <th>
                            {{ trans('cruds.pdbtm.fields.transmembrane') }}
                        </th>
                        <th>
                            {{ trans('cruds.pdbtm.fields.qvalue') }}
                        </th>
                        <th>
                            {{ trans('cruds.pdbtm.fields.tmtype') }}
                        </th>
                        <th>
                            {{ trans('cruds.pdbtm.fields.x') }}
                        </th>
                        <th>
                            {{ trans('cruds.pdbtm.fields.y') }}
                        </th>
                        <th>
                            {{ trans('cruds.pdbtm.fields.z') }}
                        </th>
                        <th>
                            {{ trans('cruds.pdbtm.fields.xx') }}
                        </th>
                        <th>
                            {{ trans('cruds.pdbtm.fields.xy') }}
                        </th>
                        <th>
                            {{ trans('cruds.pdbtm.fields.xz') }}
                        </th>
                        <th>
                            {{ trans('cruds.pdbtm.fields.xt') }}
                        </th>
                        <th>
                            {{ trans('cruds.pdbtm.fields.yx') }}
                        </th>
                        <th>
                            {{ trans('cruds.pdbtm.fields.yy') }}
                        </th>
                        <th>
                            {{ trans('cruds.pdbtm.fields.yz') }}
                        </th>
                        <th>
                            {{ trans('cruds.pdbtm.fields.yt') }}
                        </th>
                        <th>
                            {{ trans('cruds.pdbtm.fields.zx') }}
                        </th>
                        <th>
                            {{ trans('cruds.pdbtm.fields.zy') }}
                        </th>
                        <th>
                            {{ trans('cruds.pdbtm.fields.zz') }}
                        </th>
                        <th>
                            {{ trans('cruds.pdbtm.fields.zt') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pdbtms as $key => $pdbtm)
                        <tr data-entry-id="{{ $pdbtm->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $pdbtm->id ?? '' }}
                            </td>
                            <td>
                                {{ $pdbtm->matrix ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Pdbtm::TRANSMEMBRANE_SELECT[$pdbtm->transmembrane] ?? '' }}
                            </td>
                            <td>
                                {{ $pdbtm->qvalue ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Pdbtm::TMTYPE_SELECT[$pdbtm->tmtype] ?? '' }}
                            </td>
                            <td>
                                {{ $pdbtm->x ?? '' }}
                            </td>
                            <td>
                                {{ $pdbtm->y ?? '' }}
                            </td>
                            <td>
                                {{ $pdbtm->z ?? '' }}
                            </td>
                            <td>
                                {{ $pdbtm->xx ?? '' }}
                            </td>
                            <td>
                                {{ $pdbtm->xy ?? '' }}
                            </td>
                            <td>
                                {{ $pdbtm->xz ?? '' }}
                            </td>
                            <td>
                                {{ $pdbtm->xt ?? '' }}
                            </td>
                            <td>
                                {{ $pdbtm->yx ?? '' }}
                            </td>
                            <td>
                                {{ $pdbtm->yy ?? '' }}
                            </td>
                            <td>
                                {{ $pdbtm->yz ?? '' }}
                            </td>
                            <td>
                                {{ $pdbtm->yt ?? '' }}
                            </td>
                            <td>
                                {{ $pdbtm->zx ?? '' }}
                            </td>
                            <td>
                                {{ $pdbtm->zy ?? '' }}
                            </td>
                            <td>
                                {{ $pdbtm->zz ?? '' }}
                            </td>
                            <td>
                                {{ $pdbtm->zt ?? '' }}
                            </td>
                            <td>
                                @can('pdbtm_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.pdbtms.show', $pdbtm->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('pdbtm_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.pdbtms.edit', $pdbtm->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('pdbtm_delete')
                                    <form action="{{ route('admin.pdbtms.destroy', $pdbtm->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('pdbtm_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.pdbtms.massDestroy') }}",
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
  let table = $('.datatable-Pdbtm:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection