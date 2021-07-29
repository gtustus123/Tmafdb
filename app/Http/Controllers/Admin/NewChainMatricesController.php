<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyNewChainMatrixRequest;
use App\Http\Requests\StoreNewChainMatrixRequest;
use App\Http\Requests\UpdateNewChainMatrixRequest;
use App\Models\Identifier;
use App\Models\NewChainMatrix;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NewChainMatricesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('new_chain_matrix_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $newChainMatrices = NewChainMatrix::with(['identifier'])->get();

        return view('admin.newChainMatrices.index', compact('newChainMatrices'));
    }

    public function create()
    {
        abort_if(Gate::denies('new_chain_matrix_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $identifiers = Identifier::all()->pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.newChainMatrices.create', compact('identifiers'));
    }

    public function store(StoreNewChainMatrixRequest $request)
    {
        $newChainMatrix = NewChainMatrix::create($request->all());

        return redirect()->route('admin.new-chain-matrices.index');
    }

    public function edit(NewChainMatrix $newChainMatrix)
    {
        abort_if(Gate::denies('new_chain_matrix_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $identifiers = Identifier::all()->pluck('code', 'id')->prepend(trans('global.pleaseSelect'), '');

        $newChainMatrix->load('identifier');

        return view('admin.newChainMatrices.edit', compact('identifiers', 'newChainMatrix'));
    }

    public function update(UpdateNewChainMatrixRequest $request, NewChainMatrix $newChainMatrix)
    {
        $newChainMatrix->update($request->all());

        return redirect()->route('admin.new-chain-matrices.index');
    }

    public function show(NewChainMatrix $newChainMatrix)
    {
        abort_if(Gate::denies('new_chain_matrix_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $newChainMatrix->load('identifier');

        return view('admin.newChainMatrices.show', compact('newChainMatrix'));
    }

    public function destroy(NewChainMatrix $newChainMatrix)
    {
        abort_if(Gate::denies('new_chain_matrix_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $newChainMatrix->delete();

        return back();
    }

    public function massDestroy(MassDestroyNewChainMatrixRequest $request)
    {
        NewChainMatrix::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
