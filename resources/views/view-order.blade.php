@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">View Order: {{ $order->id }}</div>
                <div class="card-body">
									<p>Customer: {{ $order->customer->name }}</p>
									<p>Products</p>
									<ol>
										@foreach($order->products as $product)
											<li>{{ $product->name }} | {{ $product->price }}</li>
										@endforeach
									</ol>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection