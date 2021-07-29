<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLocalisationTypeRequest;
use App\Http\Requests\StoreLocalisationTypeRequest;
use App\Http\Requests\UpdateLocalisationTypeRequest;
use App\Models\LocalisationType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LocalisationTypesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('localisation_type_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $localisationTypes = LocalisationType::all();

        return view('admin.localisationTypes.index', compact('localisationTypes'));
    }

    public function create()
    {
        abort_if(Gate::denies('localisation_type_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.localisationTypes.create');
    }

    public function store(StoreLocalisationTypeRequest $request)
    {
        $localisationType = LocalisationType::create($request->all());

        return redirect()->route('admin.localisation-types.index');
    }

    public function edit(LocalisationType $localisationType)
    {
        abort_if(Gate::denies('localisation_type_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.localisationTypes.edit', compact('localisationType'));
    }

    public function update(UpdateLocalisationTypeRequest $request, LocalisationType $localisationType)
    {
        $localisationType->update($request->all());

        return redirect()->route('admin.localisation-types.index');
    }

    public function show(LocalisationType $localisationType)
    {
        abort_if(Gate::denies('localisation_type_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.localisationTypes.show', compact('localisationType'));
    }

    public function destroy(LocalisationType $localisationType)
    {
        abort_if(Gate::denies('localisation_type_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $localisationType->delete();

        return back();
    }

    public function massDestroy(MassDestroyLocalisationTypeRequest $request)
    {
        LocalisationType::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
