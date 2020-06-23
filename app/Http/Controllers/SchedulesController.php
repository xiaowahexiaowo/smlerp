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

	public function index()
	{
		$schedules = Schedule::paginate();
		return view('schedules.index', compact('schedules'));
	}

    public function show(Schedule $schedule)
    {
        return view('schedules.show', compact('schedule'));
    }

	public function create(Schedule $schedule)
	{
		return view('schedules.create_and_edit', compact('schedule'));
	}

	public function store(ScheduleRequest $request)
	{
		$schedule = Schedule::create($request->all());
		return redirect()->route('schedules.show', $schedule->id)->with('message', 'Created successfully.');
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

		return redirect()->route('schedules.show', $schedule->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Schedule $schedule)
	{
		$this->authorize('destroy', $schedule);
		$schedule->delete();

		return redirect()->route('schedules.index')->with('message', 'Deleted successfully.');
	}
}