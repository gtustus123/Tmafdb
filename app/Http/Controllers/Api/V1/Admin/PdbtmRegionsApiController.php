<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePdbtmRegionRequest;
use App\Http\Resources\Admin\PdbtmRegionResource;
use App\Models\PdbtmRegion;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PdbtmRegionsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pdbtm_region_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PdbtmRegionResource(PdbtmRegion::with(['region'])->get());
    }

    public function show(PdbtmRegion $pdbtmRegion)
    {
        abort_if(Gate::denies('pdbtm_region_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PdbtmRegionResource($pdbtmRegion->load(['region']));
    }

    public function update(UpdatePdbtmRegionRequest $request, PdbtmRegion $pdbtmRegion)
    {
        $pdbtmRegion->update($request->all());

        return (new PdbtmRegionResource($pdbtmRegion))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(PdbtmRegion $pdbtmRegion)
    {
        abort_if(Gate::denies('pdbtm_region_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pdbtmRegion->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
