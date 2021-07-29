<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePdbtmRequest;
use App\Http\Requests\UpdatePdbtmRequest;
use App\Http\Resources\Admin\PdbtmResource;
use App\Models\Pdbtm;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PdbtmsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pdbtm_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PdbtmResource(Pdbtm::all());
    }

    public function store(StorePdbtmRequest $request)
    {
        $pdbtm = Pdbtm::create($request->all());

        return (new PdbtmResource($pdbtm))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Pdbtm $pdbtm)
    {
        abort_if(Gate::denies('pdbtm_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PdbtmResource($pdbtm);
    }

    public function update(UpdatePdbtmRequest $request, Pdbtm $pdbtm)
    {
        $pdbtm->update($request->all());

        return (new PdbtmResource($pdbtm))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Pdbtm $pdbtm)
    {
        abort_if(Gate::denies('pdbtm_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pdbtm->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
