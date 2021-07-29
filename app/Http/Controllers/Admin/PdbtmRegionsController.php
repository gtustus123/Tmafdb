<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPdbtmRegionRequest;
use App\Http\Requests\UpdatePdbtmRegionRequest;
use App\Models\PdbtmRegion;
use App\Models\Region;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PdbtmRegionsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pdbtm_region_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pdbtmRegions = PdbtmRegion::with(['region'])->get();

        return view('admin.pdbtmRegions.index', compact('pdbtmRegions'));
    }

    public function edit(PdbtmRegion $pdbtmRegion)
    {
        abort_if(Gate::denies('pdbtm_region_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $regions = Region::all()->pluck('start', 'id')->prepend(trans('global.pleaseSelect'), '');

        $pdbtmRegion->load('region');

        return view('admin.pdbtmRegions.edit', compact('regions', 'pdbtmRegion'));
    }

    public function update(UpdatePdbtmRegionRequest $request, PdbtmRegion $pdbtmRegion)
    {
        $pdbtmRegion->update($request->all());

        return redirect()->route('admin.pdbtm-regions.index');
    }

    public function show(PdbtmRegion $pdbtmRegion)
    {
        abort_if(Gate::denies('pdbtm_region_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pdbtmRegion->load('region');

        return view('admin.pdbtmRegions.show', compact('pdbtmRegion'));
    }

    public function destroy(PdbtmRegion $pdbtmRegion)
    {
        abort_if(Gate::denies('pdbtm_region_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pdbtmRegion->delete();

        return back();
    }

    public function massDestroy(MassDestroyPdbtmRegionRequest $request)
    {
        PdbtmRegion::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
