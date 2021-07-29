<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySequenceRequest;
use App\Http\Requests\StoreSequenceRequest;
use App\Http\Requests\UpdateSequenceRequest;
use App\Models\Sequence;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SequencesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sequence_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sequences = Sequence::all();

        return view('admin.sequences.index', compact('sequences'));
    }

    public function create()
    {
        abort_if(Gate::denies('sequence_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sequences.create');
    }

    public function store(StoreSequenceRequest $request)
    {
        $sequence = Sequence::create($request->all());

        return redirect()->route('admin.sequences.index');
    }

    public function edit(Sequence $sequence)
    {
        abort_if(Gate::denies('sequence_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sequences.edit', compact('sequence'));
    }

    public function update(UpdateSequenceRequest $request, Sequence $sequence)
    {
        $sequence->update($request->all());

        return redirect()->route('admin.sequences.index');
    }

    public function show(Sequence $sequence)
    {
        abort_if(Gate::denies('sequence_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sequence->load('sequencesSpecies');

        return view('admin.sequences.show', compact('sequence'));
    }

    public function destroy(Sequence $sequence)
    {
        abort_if(Gate::denies('sequence_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sequence->delete();

        return back();
    }

    public function massDestroy(MassDestroySequenceRequest $request)
    {
        Sequence::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
