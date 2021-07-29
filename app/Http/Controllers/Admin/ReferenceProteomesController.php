<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyReferenceProteomeRequest;
use App\Http\Requests\StoreReferenceProteomeRequest;
use App\Http\Requests\UpdateReferenceProteomeRequest;
use App\Models\ReferenceProteome;
use App\Models\Sequence;
use App\Models\Species;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReferenceProteomesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('reference_proteome_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $referenceProteomes = ReferenceProteome::with(['species', 'sequences'])->get();

        $species = Species::get();

        $sequences = Sequence::get();

        return view('admin.referenceProteomes.index', compact('referenceProteomes', 'species', 'sequences'));
    }

    public function create()
    {
        abort_if(Gate::denies('reference_proteome_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $species = Species::all()->pluck('common_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.referenceProteomes.create', compact('species'));
    }

    public function store(StoreReferenceProteomeRequest $request)
    {
        $referenceProteome = ReferenceProteome::create($request->all());

        return redirect()->route('admin.reference-proteomes.index');
    }

    public function edit(ReferenceProteome $referenceProteome)
    {
        abort_if(Gate::denies('reference_proteome_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $species = Species::all()->pluck('common_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $referenceProteome->load('species', 'sequences');

        return view('admin.referenceProteomes.edit', compact('species', 'referenceProteome'));
    }

    public function update(UpdateReferenceProteomeRequest $request, ReferenceProteome $referenceProteome)
    {
        $referenceProteome->update($request->all());

        return redirect()->route('admin.reference-proteomes.index');
    }

    public function show(ReferenceProteome $referenceProteome)
    {
        abort_if(Gate::denies('reference_proteome_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $referenceProteome->load('species', 'sequences');

        return view('admin.referenceProteomes.show', compact('referenceProteome'));
    }

    public function destroy(ReferenceProteome $referenceProteome)
    {
        abort_if(Gate::denies('reference_proteome_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $referenceProteome->delete();

        return back();
    }

    public function massDestroy(MassDestroyReferenceProteomeRequest $request)
    {
        ReferenceProteome::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
