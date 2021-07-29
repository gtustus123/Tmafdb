<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUniprotAcRequest;
use App\Http\Resources\Admin\UniprotAcResource;
use App\Models\UniprotAc;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UniprotAcsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('uniprot_ac_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UniprotAcResource(UniprotAc::with(['identifier'])->get());
    }

    public function show(UniprotAc $uniprotAc)
    {
        abort_if(Gate::denies('uniprot_ac_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new UniprotAcResource($uniprotAc->load(['identifier']));
    }

    public function update(UpdateUniprotAcRequest $request, UniprotAc $uniprotAc)
    {
        $uniprotAc->update($request->all());

        return (new UniprotAcResource($uniprotAc))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(UniprotAc $uniprotAc)
    {
        abort_if(Gate::denies('uniprot_ac_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $uniprotAc->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
