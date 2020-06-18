<?php

namespace App\Http\Controllers;

use App\Models\Outstock;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\OutstockRequest;
use Illuminate\Support\Facades\DB;
class OutstocksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$outstocks = Outstock::paginate();
		return view('outstocks.index', compact('outstocks'));
	}

    public function show(Outstock $outstock)
    {
        return view('outstocks.show', compact('outstock'));
    }

	public function create(Outstock $outstock)
	{
		return view('outstocks.create_and_edit', compact('outstock'));
	}

	public function store(OutstockRequest $request,Outstock $outstock)
	{
		$outstock->fill($request->all());
        $order_id=$request->input('order_id');
        $order=DB::table('orders')->where('order_id',$order_id)->first();
        if (!$order) {
               session()->flash('warning', '订单编号不存在！');
            return redirect()->route('outstocks.index');
        }
        $outstock->customer_name=$order->customer_name;
        $outstock->user_name=$order->user()->name;
        $outstock->save();
		return redirect()->route('outstocks.show', $outstock->id)->with('message', 'Created successfully.');
	}

	public function edit(Outstock $outstock)
	{
        $this->authorize('update', $outstock);
		return view('outstocks.create_and_edit', compact('outstock'));
	}

	public function update(OutstockRequest $request, Outstock $outstock)
	{
		$this->authorize('update', $outstock);
		$outstock->update($request->all());

		return redirect()->route('outstocks.show', $outstock->id)->with('message', 'Updated successfully.');
	}

	public function destroy(Outstock $outstock)
	{
		$this->authorize('destroy', $outstock);
		$outstock->delete();

		return redirect()->route('outstocks.index')->with('message', 'Deleted successfully.');
	}
}
