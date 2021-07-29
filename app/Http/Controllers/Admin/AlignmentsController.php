<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alignment;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AlignmentsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('alignment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $alignments = Alignment::with(['seq_1', 'seq_2'])->get();

        return view('admin.alignments.index', compact('alignments'));
    }

    public function show(Alignment $alignment)
    {
        abort_if(Gate::denies('alignment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $alignment->load('seq_1', 'seq_2');

        return view('admin.alignments.show', compact('alignment'));
    }
}
