<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCctopReRequest;
use App\Models\CctopRe;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CctopResController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('cctop_re_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cctopRes = CctopRe::with(['identifier'])->get();

        return view('admin.cctopRes.index', compact('cctopRes'));
    }

    public function show(CctopRe $cctopRe)
    {
        abort_if(Gate::denies('cctop_re_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cctopRe->load('identifier');

        return view('admin.cctopRes.show', compact('cctopRe'));
    }

    public function destroy(CctopRe $cctopRe)
    {
        abort_if(Gate::denies('cctop_re_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cctopRe->delete();

        return back();
    }

    public function massDestroy(MassDestroyCctopReRequest $request)
    {
        CctopRe::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
