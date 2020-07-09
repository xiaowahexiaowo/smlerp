<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ScheduleRequest;

class SchedulesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index(Schedule $schedule)
	{
        $this->authorize('index', $schedule);
		$schedules = Schedule::paginate();
		return view('schedules.index', compact('schedules'));
	}

    public function show(Schedule $schedule)
    {
        $this->authorize('index', $schedule);
        return view('schedules.show', compact('schedule'));
    }

	public function create(Schedule $schedule)
	{
        $this->authorize('create', $schedule);
		return view('schedules.create_and_edit', compact('schedule'));
	}

	public function store(ScheduleRequest $request)
	{
		$schedule = Schedule::create($request->all());
        session()->flash('success', '排产单明细创建成功！');
		return redirect()->route('schedules.show', $schedule->id);
	}

	public function edit(Schedule $schedule)
	{
        $this->authorize('update', $schedule);
		return view('schedules.create_and_edit', compact('schedule'));
	}

	public function update(ScheduleRequest $request, Schedule $schedule)
	{
		$this->authorize('update', $schedule);
		$schedule->update($request->all());
session()->flash('success', '排产单明细更新成功！');
		return redirect()->route('schedules.show', $schedule->id);
	}

	public function destroy(Schedule $schedule)
	{
		$this->authorize('destroy', $schedule);
		$schedule->delete();
session()->flash('success', '排产单明细删除成功！');
		return redirect()->route('schedules.index');
	}
}
