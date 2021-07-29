@can('experiment_sub_type_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.experiment-sub-types.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.experimentSubType.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.experimentSubType.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-experimentExperimentSubTypes">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.experimentSubType.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.experimentSubType.fields.experiment') }}
                        </th>
                        <th>
                            {{ trans('cruds.experimentSubType.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.experimentSubType.fields.description') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($experimentSubTypes as $key => $experimentSubType)
                        <tr data-entry-id="{{ $experimentSubType->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $experimentSubType->id ?? '' }}
                            </td>
                            <td>
                                {{ $experimentSubType->experiment->name ?? '' }}
                            </td>
                            <td>
                                {{ $experimentSubType->name ?? '' }}
                            </td>
                            <td>
                                {{ $experimentSubType->description ?? '' }}
                            </td>
                            <td>
                                @can('experiment_sub_type_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.experiment-sub-types.show', $experimentSubType->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('experiment_sub_type_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.experiment-sub-types.edit', $experimentSubType->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('experiment_sub_type_delete')
                                    <form action="{{ route('admin.experiment-sub-types.destroy', $experimentSubType->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('experiment_sub_type_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.experiment-sub-types.massDestroy') }}",
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
    order: [[ 2, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-experimentExperimentSubTypes:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection