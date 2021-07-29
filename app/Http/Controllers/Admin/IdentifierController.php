<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyIdentifierRequest;
use App\Http\Requests\UpdateIdentifierRequest;
use App\Models\Database;
use App\Models\Identifier;
use App\Models\Sequence;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IdentifierController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('identifier_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $identifiers = Identifier::with(['database', 'sequence'])->get();

        $databases = Database::get();

        $sequences = Sequence::get();

        return view('admin.identifiers.index', compact('identifiers', 'databases', 'sequences'));
    }

    public function edit(Identifier $identifier)
    {
        abort_if(Gate::denies('identifier_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $databases = Database::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sequences = Sequence::all()->pluck('hash', 'id')->prepend(trans('global.pleaseSelect'), '');

        $identifier->load('database', 'sequence');

        return view('admin.identifiers.edit', compact('databases', 'sequences', 'identifier'));
    }

    public function update(UpdateIdentifierRequest $request, Identifier $identifier)
    {
        $identifier->update($request->all());

        return redirect()->route('admin.identifiers.index');
    }

    public function show(Identifier $identifier)
    {
        abort_if(Gate::denies('identifier_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $identifier->load('database', 'sequence');

        return view('admin.identifiers.show', compact('identifier'));
    }

    public function destroy(Identifier $identifier)
    {
        abort_if(Gate::denies('identifier_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $identifier->delete();

        return back();
    }

    public function massDestroy(MassDestroyIdentifierRequest $request)
    {
        Identifier::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
