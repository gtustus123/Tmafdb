<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewChainMatrixRequest;
use App\Http\Requests\UpdateNewChainMatrixRequest;
use App\Http\Resources\Admin\NewChainMatrixResource;
use App\Models\NewChainMatrix;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NewChainMatricesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('new_chain_matrix_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NewChainMatrixResource(NewChainMatrix::with(['identifier'])->get());
    }

    public function store(StoreNewChainMatrixRequest $request)
    {
        $newChainMatrix = NewChainMatrix::create($request->all());

        return (new NewChainMatrixResource($newChainMatrix))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(NewChainMatrix $newChainMatrix)
    {
        abort_if(Gate::denies('new_chain_matrix_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NewChainMatrixResource($newChainMatrix->load(['identifier']));
    }

    public function update(UpdateNewChainMatrixRequest $request, NewChainMatrix $newChainMatrix)
    {
        $newChainMatrix->update($request->all());

        return (new NewChainMatrixResource($newChainMatrix))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(NewChainMatrix $newChainMatrix)
    {
        abort_if(Gate::denies('new_chain_matrix_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $newChainMatrix->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
