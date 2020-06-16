@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col-md-10 offset-md-1">
    <div class="card ">
      <div class="card-header">
        <h1>Instock / Show #{{ $instock->id }}</h1>
      </div>

      <div class="card-body">
        <div class="card-block bg-light">
          <div class="row">
            <div class="col-md-6">
              <a class="btn btn-link" href="{{ route('instocks.index') }}"><- Back</a>
            </div>
            <div class="col-md-6">
              <a class="btn btn-sm btn-warning float-right mt-1" href="{{ route('instocks.edit', $instock->id) }}">
                Edit
              </a>
            </div>
          </div>
        </div>
        <br>

        <label>Stock_type</label>
<p>
	{{ $instock->stock_type }}
</p> <label>Batch</label>
<p>
	{{ $instock->batch }}
</p> <label>In_date</label>
<p>
	{{ $instock->in_date }}
</p> <label>Supplier</label>
<p>
	{{ $instock->supplier }}
</p> <label>Stock_man</label>
<p>
	{{ $instock->stock_man }}
</p> <label>Stock_factory</label>
<p>
	{{ $instock->stock_factory }}
</p>
      </div>
    </div>
  </div>
</div>

@endsection
