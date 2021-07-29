<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySpeciesRequest;
use App\Http\Requests\StoreSpeciesRequest;
use App\Http\Requests\UpdateSpeciesRequest;
use App\Models\Sequence;
use App\Models\Species;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SpeciesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('species_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $species = Species::with(['sequences'])->get();

        return view('admin.species.index', compact('species'));
    }

    public function create()
    {
        abort_if(Gate::denies('species_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sequences = Sequence::all()->pluck('hash', 'id');

        return view('admin.species.create', compact('sequences'));
    }

    public function store(StoreSpeciesRequest $request)
    {
        $species = Species::create($request->all());
        $species->sequences()->sync($request->input('sequences', []));

        return redirect()->route('admin.species.index');
    }

    public function edit(Species $species)
    {
        abort_if(Gate::denies('species_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sequences = Sequence::all()->pluck('hash', 'id');

        $species->load('sequences');

        return view('admin.species.edit', compact('sequences', 'species'));
    }

    public function update(UpdateSpeciesRequest $request, Species $species)
    {
        $species->update($request->all());
        $species->sequences()->sync($request->input('sequences', []));

        return redirect()->route('admin.species.index');
    }

    public function show(Species $species)
    {
        abort_if(Gate::denies('species_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $species->load('sequences');

        return view('admin.species.show', compact('species'));
    }

    public function destroy(Species $species)
    {
        abort_if(Gate::denies('species_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $species->delete();

        return back();
    }

    public function massDestroy(MassDestroySpeciesRequest $request)
    {
        Species::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
