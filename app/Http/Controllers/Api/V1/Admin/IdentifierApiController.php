<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateIdentifierRequest;
use App\Http\Resources\Admin\IdentifierResource;
use App\Models\Identifier;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IdentifierApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('identifier_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new IdentifierResource(Identifier::with(['database', 'sequence'])->get());
    }

    public function show(Identifier $identifier)
    {
        abort_if(Gate::denies('identifier_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new IdentifierResource($identifier->load(['database', 'sequence']));
    }

    public function update(UpdateIdentifierRequest $request, Identifier $identifier)
    {
        $identifier->update($request->all());

        return (new IdentifierResource($identifier))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Identifier $identifier)
    {
        abort_if(Gate::denies('identifier_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $identifier->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
