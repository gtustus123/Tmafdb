<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUniprotAcRequest;
use App\Http\Requests\UpdateUniprotAcRequest;
use App\Models\Identifier;
use App\Models\UniprotAc;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UniprotAcsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('uniprot_ac_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $uniprotAcs = UniprotAc::with(['identifier'])->get();

        $identifiers = Identifier::get();

        return view('admin.uniprotAcs.index', compact('uniprotAcs', 'identifiers'));
    }

    public function edit(UniprotAc $uniprotAc)
    {
        abort_if(Gate::denies('uniprot_ac_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $identifiers = Identifier::all()->pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $uniprotAc->load('identifier');

        return view('admin.uniprotAcs.edit', compact('identifiers', 'uniprotAc'));
    }

    public function update(UpdateUniprotAcRequest $request, UniprotAc $uniprotAc)
    {
        $uniprotAc->update($request->all());

        return redirect()->route('admin.uniprot-acs.index');
    }

    public function show(UniprotAc $uniprotAc)
    {
        abort_if(Gate::denies('uniprot_ac_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $uniprotAc->load('identifier');

        return view('admin.uniprotAcs.show', compact('uniprotAc'));
    }

    public function destroy(UniprotAc $uniprotAc)
    {
        abort_if(Gate::denies('uniprot_ac_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $uniprotAc->delete();

        return back();
    }

    public function massDestroy(MassDestroyUniprotAcRequest $request)
    {
        UniprotAc::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
