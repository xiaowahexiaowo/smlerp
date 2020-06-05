<?php

namespace App\Http\Controllers;

use App\Models\Collected;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CollectedRequest;
use Illuminate\Support\Facades\DB;
class CollectedsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$collecteds = Collected::paginate();
		return view('collecteds.index', compact('collecteds'));
	}

    public function show(Collected $collected)
    {
        return view('collecteds.show', compact('collected'));
    }

	public function create(Collected $collected)
	{
		return view('collecteds.create_and_edit', compact('collected'));
	}

	public function store(CollectedRequest $request,Collected $collected)
	{
		$collected->fill($request->all());
        $order_id=$request->input('order_id');
         $order=DB::table('orders')->where('order_id',$order_id)->first();
         if($order){
          $collected->customer_name=$order->customer_name;
           $collected->save();
           return redirect()->route('collecteds.index')->with('message', '创建成功.');
         }

		return redirect()->route('collecteds.index')->with('message', '创建失败，订单号不存在.');
	}

	public function edit(Collected $collected)
	{
        $this->authorize('update', $collected);
		return view('collecteds.create_and_edit', compact('collected'));
	}

	public function update(CollectedRequest $request, Collected $collected)
	{
		$this->authorize('update', $collected);
		$collected->update($request->all());

		return redirect()->route('collecteds.show', $collected->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Collected $collected)
	{
		$this->authorize('destroy', $collected);
		$collected->delete();

		return redirect()->route('collecteds.index')->with('message', 'Deleted successfully.');
	}
}
