<?php

namespace App\Http\Controllers;

use App\Models\Blackboard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlackboardRequest;

class BlackboardsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$blackboards = Blackboard::paginate();
		return view('blackboards.index', compact('blackboards'));
	}

    public function show(Blackboard $blackboard)
    {
        return view('blackboards.show', compact('blackboard'));
    }

	public function create(Blackboard $blackboard)
	{
		return view('blackboards.create_and_edit', compact('blackboard'));
	}

	public function store(BlackboardRequest $request)
	{
		$blackboard = Blackboard::create($request->all());
		return redirect()->route('blackboards.index')->with('message', 'Created successfully.');
	}

	public function edit(Blackboard $blackboard)
	{
        $this->authorize('update', $blackboard);
		return view('blackboards.create_and_edit', compact('blackboard'));
	}

	public function update(BlackboardRequest $request, Blackboard $blackboard)
	{
		$this->authorize('update', $blackboard);
		$blackboard->update($request->all());

		return redirect()->route('blackboards.show', $blackboard->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Blackboard $blackboard)
	{
		$this->authorize('destroy', $blackboard);
		$blackboard->delete();

		return redirect()->route('blackboards.index')->with('message', 'Deleted successfully.');
	}
}
