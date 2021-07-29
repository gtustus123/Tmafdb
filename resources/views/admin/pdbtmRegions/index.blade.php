@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.pdbtmRegion.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-PdbtmRegion">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.pdbtmRegion.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.pdbtmRegion.fields.region') }}
                        </th>
                        <th>
                            {{ trans('cruds.region.fields.end') }}
                        </th>
                        <th>
                            {{ trans('cruds.pdbtmRegion.fields.start') }}
                        </th>
                        <th>
                            {{ trans('cruds.pdbtmRegion.fields.end') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pdbtmRegions as $key => $pdbtmRegion)
                        <tr data-entry-id="{{ $pdbtmRegion->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $pdbtmRegion->id ?? '' }}
                            </td>
                            <td>
                                {{ $pdbtmRegion->region->start ?? '' }}
                            </td>
                            <td>
                                {{ $pdbtmRegion->region->end ?? '' }}
                            </td>
                            <td>
                                {{ $pdbtmRegion->start ?? '' }}
                            </td>
                            <td>
                                {{ $pdbtmRegion->end ?? '' }}
                            </td>
                            <td>
                                @can('pdbtm_region_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.pdbtm-regions.show', $pdbtmRegion->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('pdbtm_region_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.pdbtm-regions.edit', $pdbtmRegion->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('pdbtm_region_delete')
                                    <form action="{{ route('admin.pdbtm-regions.destroy', $pdbtmRegion->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('pdbtm_region_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.pdbtm-regions.massDestroy') }}",
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
  let table = $('.datatable-PdbtmRegion:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection