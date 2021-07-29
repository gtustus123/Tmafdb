@can('species_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.species.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.species.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.species.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-sequencesSpecies">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.species.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.species.fields.code') }}
                        </th>
                        <th>
                            {{ trans('cruds.species.fields.kingdom') }}
                        </th>
                        <th>
                            {{ trans('cruds.species.fields.taxon') }}
                        </th>
                        <th>
                            {{ trans('cruds.species.fields.common_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.species.fields.official_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.species.fields.flag') }}
                        </th>
                        <th>
                            {{ trans('cruds.species.fields.sequences') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($species as $key => $species)
                        <tr data-entry-id="{{ $species->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $species->id ?? '' }}
                            </td>
                            <td>
                                {{ $species->code ?? '' }}
                            </td>
                            <td>
                                {{ $species->kingdom ?? '' }}
                            </td>
                            <td>
                                {{ $species->taxon ?? '' }}
                            </td>
                            <td>
                                {{ $species->common_name ?? '' }}
                            </td>
                            <td>
                                {{ $species->official_name ?? '' }}
                            </td>
                            <td>
                                {{ $species->flag ?? '' }}
                            </td>
                            <td>
                                @foreach($species->sequences as $key => $item)
                                    <span class="badge badge-info">{{ $item->hash }}</span>
                                @endforeach
                            </td>
                            <td>
                                @can('species_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.species.show', $species->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('species_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.species.edit', $species->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('species_delete')
                                    <form action="{{ route('admin.species.destroy', $species->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('species_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.species.massDestroy') }}",
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
  let table = $('.datatable-sequencesSpecies:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection