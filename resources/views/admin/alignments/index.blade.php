@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.alignment.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Alignment">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.alignment.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.alignment.fields.seq_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.alignment.fields.seq_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.alignment.fields.alignment') }}
                        </th>
                        <th>
                            {{ trans('cruds.alignment.fields.identity') }}
                        </th>
                        <th>
                            {{ trans('cruds.alignment.fields.pair') }}
                        </th>
                        <th>
                            {{ trans('cruds.alignment.fields.gap_1') }}
                        </th>
                        <th>
                            {{ trans('cruds.alignment.fields.gap_2') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($alignments as $key => $alignment)
                        <tr data-entry-id="{{ $alignment->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $alignment->id ?? '' }}
                            </td>
                            <td>
                                {{ $alignment->seq_1->hash ?? '' }}
                            </td>
                            <td>
                                {{ $alignment->seq_2->hash ?? '' }}
                            </td>
                            <td>
                                {{ $alignment->alignment ?? '' }}
                            </td>
                            <td>
                                {{ $alignment->identity ?? '' }}
                            </td>
                            <td>
                                {{ $alignment->pair ?? '' }}
                            </td>
                            <td>
                                {{ $alignment->gap_1 ?? '' }}
                            </td>
                            <td>
                                {{ $alignment->gap_2 ?? '' }}
                            </td>
                            <td>
                                @can('alignment_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.alignments.show', $alignment->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
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
  
  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Alignment:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection