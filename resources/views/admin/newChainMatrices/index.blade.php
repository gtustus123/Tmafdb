@extends('layouts.admin')
@section('content')
@can('new_chain_matrix_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.new-chain-matrices.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.newChainMatrix.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.newChainMatrix.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-NewChainMatrix">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.newChainMatrix.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.newChainMatrix.fields.identifier') }}
                        </th>
                        <th>
                            {{ trans('cruds.newChainMatrix.fields.matrix') }}
                        </th>
                        <th>
                            {{ trans('cruds.newChainMatrix.fields.transformxx') }}
                        </th>
                        <th>
                            {{ trans('cruds.newChainMatrix.fields.transformxy') }}
                        </th>
                        <th>
                            {{ trans('cruds.newChainMatrix.fields.transformxz') }}
                        </th>
                        <th>
                            {{ trans('cruds.newChainMatrix.fields.transformxt') }}
                        </th>
                        <th>
                            {{ trans('cruds.newChainMatrix.fields.transformyx') }}
                        </th>
                        <th>
                            {{ trans('cruds.newChainMatrix.fields.transformyy') }}
                        </th>
                        <th>
                            {{ trans('cruds.newChainMatrix.fields.transformyz') }}
                        </th>
                        <th>
                            {{ trans('cruds.newChainMatrix.fields.transformyt') }}
                        </th>
                        <th>
                            {{ trans('cruds.newChainMatrix.fields.transformzx') }}
                        </th>
                        <th>
                            {{ trans('cruds.newChainMatrix.fields.transformzy') }}
                        </th>
                        <th>
                            {{ trans('cruds.newChainMatrix.fields.transformzz') }}
                        </th>
                        <th>
                            {{ trans('cruds.newChainMatrix.fields.transformzt') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($newChainMatrices as $key => $newChainMatrix)
                        <tr data-entry-id="{{ $newChainMatrix->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $newChainMatrix->id ?? '' }}
                            </td>
                            <td>
                                {{ $newChainMatrix->identifier->code ?? '' }}
                            </td>
                            <td>
                                {{ $newChainMatrix->matrix ?? '' }}
                            </td>
                            <td>
                                {{ $newChainMatrix->transformxx ?? '' }}
                            </td>
                            <td>
                                {{ $newChainMatrix->transformxy ?? '' }}
                            </td>
                            <td>
                                {{ $newChainMatrix->transformxz ?? '' }}
                            </td>
                            <td>
                                {{ $newChainMatrix->transformxt ?? '' }}
                            </td>
                            <td>
                                {{ $newChainMatrix->transformyx ?? '' }}
                            </td>
                            <td>
                                {{ $newChainMatrix->transformyy ?? '' }}
                            </td>
                            <td>
                                {{ $newChainMatrix->transformyz ?? '' }}
                            </td>
                            <td>
                                {{ $newChainMatrix->transformyt ?? '' }}
                            </td>
                            <td>
                                {{ $newChainMatrix->transformzx ?? '' }}
                            </td>
                            <td>
                                {{ $newChainMatrix->transformzy ?? '' }}
                            </td>
                            <td>
                                {{ $newChainMatrix->transformzz ?? '' }}
                            </td>
                            <td>
                                {{ $newChainMatrix->transformzt ?? '' }}
                            </td>
                            <td>
                                @can('new_chain_matrix_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.new-chain-matrices.show', $newChainMatrix->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('new_chain_matrix_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.new-chain-matrices.edit', $newChainMatrix->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('new_chain_matrix_delete')
                                    <form action="{{ route('admin.new-chain-matrices.destroy', $newChainMatrix->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('new_chain_matrix_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.new-chain-matrices.massDestroy') }}",
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
  let table = $('.datatable-NewChainMatrix:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection