@extends('layouts.admin')
@section('content')
@can('reference_proteome_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.reference-proteomes.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.referenceProteome.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.referenceProteome.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ReferenceProteome">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.referenceProteome.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.referenceProteome.fields.species') }}
                        </th>
                        <th>
                            {{ trans('cruds.species.fields.official_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.referenceProteome.fields.url') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                @foreach($species as $key => $item)
                                    <option value="{{ $item->common_name }}">{{ $item->common_name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($referenceProteomes as $key => $referenceProteome)
                        <tr data-entry-id="{{ $referenceProteome->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $referenceProteome->id ?? '' }}
                            </td>
                            <td>
                                {{ $referenceProteome->species->common_name ?? '' }}
                            </td>
                            <td>
                                {{ $referenceProteome->species->official_name ?? '' }}
                            </td>
                            <td>
                                {{ $referenceProteome->url ?? '' }}
                            </td>
                            <td>
                                @can('reference_proteome_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.reference-proteomes.show', $referenceProteome->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('reference_proteome_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.reference-proteomes.edit', $referenceProteome->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('reference_proteome_delete')
                                    <form action="{{ route('admin.reference-proteomes.destroy', $referenceProteome->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('reference_proteome_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.reference-proteomes.massDestroy') }}",
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
  let table = $('.datatable-ReferenceProteome:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection