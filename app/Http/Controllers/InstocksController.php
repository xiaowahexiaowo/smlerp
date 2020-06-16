<?php

namespace App\Http\Controllers;

use App\Models\Instock;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\InstockRequest;

class InstocksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$instocks = Instock::paginate();
		return view('instocks.index', compact('instocks'));
	}

    public function show(Instock $instock)
    {
        return view('instocks.show', compact('instock'));
    }

	public function create(Instock $instock)
	{
		return view('instocks.create_and_edit', compact('instock'));
	}

	public function store(InstockRequest $request)
	{
		$instock = Instock::create($request->all());
		return redirect()->route('instocks.show', $instock->id)->with('message', 'Created successfully.');
	}

	public function edit(Instock $instock)
	{
        $this->authorize('update', $instock);
		return view('instocks.create_and_edit', compact('instock'));
	}

	public function update(InstockRequest $request, Instock $instock)
	{
		$this->authorize('update', $instock);
		$instock->update($request->all());

		return redirect()->route('instocks.show', $instock->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Instock $instock)
	{
		$this->authorize('destroy', $instock);
		$instock->delete();

		return redirect()->route('instocks.index')->with('message', 'Deleted successfully.');
	}
}