@extends('layouts.app')

@section('content')
	<div id='pos-row'>
		<h2 class='text-center'>Order date and Time: <span class='text-success'>{{$order->created_at}}</span></h2>
		<h2 class='text-center'>Order Amount: <span class='text-success'>{{$order->total_amount}} Taka</span></h2>
		<table class="table table-striped">
			<thead>
				<tr>
					<th scope="col">Name</th>
					<th scope="col">Quantity</th>
					<th scope="col">Unit Price</th>
					<th scope="col">Total Price</th>
				</tr>
			</thead>
			<tbody>
				@foreach( $order->products as $product )
					<tr>
						<th scope="row">{{$product->name}}</th>
						<!-- <td>@{{(new Date(Date.parse(order.created_at))).toDateString().split(" ").slice(1,4).join(" ")}}</td> -->
						<td>{{$product->pivot->quantity}}</td>
						<td>{{$product->price}}</td>
						<td>{{$product->pivot->price}}</td>
						<!-- <td><a href='/orders/@{{order.id}}'>Go To Order</a></td> -->
						<!-- <td><a :href="'/orders/'+order.id">Go To Order + @{{order.id}}</a></td> -->
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection
