<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRegionSourceRequest;
use App\Http\Requests\StoreRegionSourceRequest;
use App\Http\Requests\UpdateRegionSourceRequest;
use App\Models\RegionSource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RegionSourceController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('region_source_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $regionSources = RegionSource::all();

        return view('admin.regionSources.index', compact('regionSources'));
    }

    public function create()
    {
        abort_if(Gate::denies('region_source_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.regionSources.create');
    }

    public function store(StoreRegionSourceRequest $request)
    {
        $regionSource = RegionSource::create($request->all());

        return redirect()->route('admin.region-sources.index');
    }

    public function edit(RegionSource $regionSource)
    {
        abort_if(Gate::denies('region_source_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.regionSources.edit', compact('regionSource'));
    }

    public function update(UpdateRegionSourceRequest $request, RegionSource $regionSource)
    {
        $regionSource->update($request->all());

        return redirect()->route('admin.region-sources.index');
    }

    public function show(RegionSource $regionSource)
    {
        abort_if(Gate::denies('region_source_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.regionSources.show', compact('regionSource'));
    }

    public function destroy(RegionSource $regionSource)
    {
        abort_if(Gate::denies('region_source_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $regionSource->delete();

        return back();
    }

    public function massDestroy(MassDestroyRegionSourceRequest $request)
    {
        RegionSource::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
