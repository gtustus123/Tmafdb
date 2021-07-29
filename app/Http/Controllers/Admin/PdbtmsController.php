<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPdbtmRequest;
use App\Http\Requests\StorePdbtmRequest;
use App\Http\Requests\UpdatePdbtmRequest;
use App\Models\Pdbtm;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PdbtmsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pdbtm_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pdbtms = Pdbtm::all();

        return view('admin.pdbtms.index', compact('pdbtms'));
    }

    public function create()
    {
        abort_if(Gate::denies('pdbtm_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pdbtms.create');
    }

    public function store(StorePdbtmRequest $request)
    {
        $pdbtm = Pdbtm::create($request->all());

        return redirect()->route('admin.pdbtms.index');
    }

    public function edit(Pdbtm $pdbtm)
    {
        abort_if(Gate::denies('pdbtm_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pdbtms.edit', compact('pdbtm'));
    }

    public function update(UpdatePdbtmRequest $request, Pdbtm $pdbtm)
    {
        $pdbtm->update($request->all());

        return redirect()->route('admin.pdbtms.index');
    }

    public function show(Pdbtm $pdbtm)
    {
        abort_if(Gate::denies('pdbtm_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pdbtms.show', compact('pdbtm'));
    }

    public function destroy(Pdbtm $pdbtm)
    {
        abort_if(Gate::denies('pdbtm_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pdbtm->delete();

        return back();
    }

    public function massDestroy(MassDestroyPdbtmRequest $request)
    {
        Pdbtm::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
