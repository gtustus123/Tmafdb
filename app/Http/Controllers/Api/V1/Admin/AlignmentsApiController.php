<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\AlignmentResource;
use App\Models\Alignment;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AlignmentsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('alignment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AlignmentResource(Alignment::with(['seq_1', 'seq_2'])->get());
    }

    public function show(Alignment $alignment)
    {
        abort_if(Gate::denies('alignment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new AlignmentResource($alignment->load(['seq_1', 'seq_2']));
    }
}
