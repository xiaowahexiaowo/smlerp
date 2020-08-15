<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ScheduleRequest;
use App\Handlers\FileUploadHandler;
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

	public function store(ScheduleRequest $request, Schedule $schedule,FileUploadHandler $uploader)
	{


            $schedule->fill($request->all());
           if ($request->avatar) {
            $result = $uploader->save($request->avatar, 'avatars', 'file');
            if ($result) {
                $schedule['avatar'] = $result['path'];
            }
        }else{
            $schedule['avatar']="";
        }
        $schedule->save();
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
          // 上传了文件则更新文件路径

        if ($request->avatar) {
            $result = $uploader->save($request->avatar, 'avatars', 'file');
            if ($result) {

              $schedule->fill(['avatar'=>$result['path']])->save();
            }

        }
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

    // 下载排产发货明细中的文件
     public function download(Schedule $schedule)
    {
          // 判断文件是否存在
        if(!file_exists($schedule->avatar)){
            session()->flash('warning', '文件不存在！');
            return redirect()->route('schedules.show', $schedule->id);
         }


        return response()->download($schedule->avatar);

        // return Storage::download($order->avatar, '销售单文件下载');

    }
}
