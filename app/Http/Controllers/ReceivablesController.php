<?php

namespace App\Http\Controllers;

use App\Models\Receivable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReceivableRequest;

class ReceivablesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index(Receivable $receivable)
	{

        $receivables = Receivable::paginate();
		return view('receivables.index', compact('receivables'));
	}

    public function show(Receivable $receivable)
    {
        return view('receivables.show', compact('receivable'));
    }

	public function create(Receivable $receivable)
	{
		return view('receivables.create_and_edit', compact('receivable'));
	}

	public function store(ReceivableRequest $request)
	{
		$receivable = Receivable::create($request->all());
		return redirect()->route('receivables.show', $receivable->id)->with('message', 'Created successfully.');
	}

	public function edit(Receivable $receivable)
	{
        $this->authorize('update', $receivable);
		return view('receivables.create_and_edit', compact('receivable'));
	}

	public function update(ReceivableRequest $request, Receivable $receivable)
	{
		$this->authorize('update', $receivable);
		$receivable->update($request->all());

		return redirect()->route('receivables.show', $receivable->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Receivable $receivable)
	{
		$this->authorize('destroy', $receivable);
		$receivable->delete();

		return redirect()->route('receivables.index')->with('message', 'Deleted successfully.');
	}
}
