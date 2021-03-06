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

	public function index(Blackboard $blackboard)
	{
        $this->authorize('index', $blackboard);
		$blackboards = Blackboard::paginate(30);
		return view('blackboards.index', compact('blackboards'));
	}

    public function show(Blackboard $blackboard)
    {
        $this->authorize('index', $blackboard);
        return view('blackboards.show', compact('blackboard'));
    }

	public function create(Blackboard $blackboard)
	{
        $this->authorize('create', $blackboard);
		return view('blackboards.create_and_edit', compact('blackboard'));
	}

	public function store(BlackboardRequest $request)
	{
		$blackboard = Blackboard::create($request->all());
        session()->flash('success', '小黑板创建成功！');
		return redirect()->route('blackboards.index');
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
session()->flash('success', '小黑板更新成功！');
		return redirect()->route('blackboards.index', $blackboard->id);
	}

	public function destroy(Blackboard $blackboard)
	{
		$this->authorize('destroy', $blackboard);
		$blackboard->delete();
session()->flash('success', '小黑板删除成功！');
		return redirect()->route('blackboards.index');
	}
}
