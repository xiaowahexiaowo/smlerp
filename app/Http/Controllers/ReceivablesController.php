<?php

namespace App\Http\Controllers;

use App\Models\Receivable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReceivableRequest;
use Auth;
use App\Exports\ReceivablesExport;
class ReceivablesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

	public function index(Receivable $receivable)
	{
$this->authorize('index', $receivable);

// 按日期查询

         // $date_begin=$request->input('date_begin');
         // $date_end=$request->input('date_end');

    //      // 保存查询参数  供导出时使用
    //     $request->flash();



   $user=Auth::user();
         // 财务和管理员查看的是所有
        if(!$user->hasRole('Flb_saleman')){

                $receivables = Receivable::paginate(30);

        }else{
            $orders=$user->orders()->get();

            $order_ids= array();

            foreach ($orders as  $order) {
                $order_ids[] = $order->order_id;
            }

           $receivables=Receivable::whereIn('order_id', $order_ids)->paginate(30);
        }


		return view('receivables.index', compact('receivables'));
	}


     public function export()
    {

         return (new ReceivablesExport)->download('应收账款统计.xlsx');
    }

 //    public function show(Receivable $receivable)
 //    {
 //        return view('receivables.show', compact('receivable'));
 //    }

	// public function create(Receivable $receivable)
	// {
	// 	return view('receivables.create_and_edit', compact('receivable'));
	// }

	// public function store(ReceivableRequest $request)
	// {
	// 	$receivable = Receivable::create($request->all());
	// 	return redirect()->route('receivables.show', $receivable->id)->with('message', 'Created successfully.');
	// }

	// public function edit(Receivable $receivable)
	// {
 //        $this->authorize('update', $receivable);
	// 	return view('receivables.create_and_edit', compact('receivable'));
	// }

	// public function update(ReceivableRequest $request, Receivable $receivable)
	// {
	// 	$this->authorize('update', $receivable);
	// 	$receivable->update($request->all());

	// 	return redirect()->route('receivables.show', $receivable->id)->with('message', 'Updated successfully.');
	// }

	// public function destroy(Receivable $receivable)
	// {
	// 	$this->authorize('destroy', $receivable);
	// 	$receivable->delete();

	// 	return redirect()->route('receivables.index')->with('message', 'Deleted successfully.');
	// }
}
