<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSequenceRequest;
use App\Http\Requests\UpdateSequenceRequest;
use App\Http\Resources\Admin\SequenceResource;
use App\Models\Sequence;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SequencesApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sequence_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SequenceResource(Sequence::all());
    }

    public function store(StoreSequenceRequest $request)
    {
        $sequence = Sequence::create($request->all());

        return (new SequenceResource($sequence))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Sequence $sequence)
    {
        abort_if(Gate::denies('sequence_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SequenceResource($sequence);
    }

    public function update(UpdateSequenceRequest $request, Sequence $sequence)
    {
        $sequence->update($request->all());

        return (new SequenceResource($sequence))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Sequence $sequence)
    {
        abort_if(Gate::denies('sequence_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sequence->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
