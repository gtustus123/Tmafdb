<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRegionRequest;
use App\Http\Requests\UpdateRegionRequest;
use App\Models\Identifier;
use App\Models\LocalisationType;
use App\Models\Region;
use App\Models\RegionSource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RegionsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('region_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $regions = Region::with(['identifier', 'localisation_type', 'region_source'])->get();

        return view('admin.regions.index', compact('regions'));
    }

    public function edit(Region $region)
    {
        abort_if(Gate::denies('region_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $identifiers = Identifier::all()->pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $localisation_types = LocalisationType::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $region_sources = RegionSource::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $region->load('identifier', 'localisation_type', 'region_source');

        return view('admin.regions.edit', compact('identifiers', 'localisation_types', 'region_sources', 'region'));
    }

    public function update(UpdateRegionRequest $request, Region $region)
    {
        $region->update($request->all());

        return redirect()->route('admin.regions.index');
    }

    public function show(Region $region)
    {
        abort_if(Gate::denies('region_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $region->load('identifier', 'localisation_type', 'region_source');

        return view('admin.regions.show', compact('region'));
    }

    public function destroy(Region $region)
    {
        abort_if(Gate::denies('region_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $region->delete();

        return back();
    }

    public function massDestroy(MassDestroyRegionRequest $request)
    {
        Region::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
