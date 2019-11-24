@extends('layouts.app')

@section('content')
	<div class="row justify-content-center" id="pos-row">
		<div v-show="reportShowSection == 'report'" class='pt-3'>
			<h3>Please select your date range:</h3>
			<br>
			<!-- <div> -->
			<!--	<v&#45;date&#45;picker -->
			<!--		:value="null" -->
			<!--		mode="range" -->
			<!--		v&#45;model='range' -->
			<!--		/> -->
			<!-- </div> -->
			<div>

				<form @submit.prevent="reportFormSubmitted">
					@csrf
					<div>
						<v-date-picker
							mode='range'
							v-model='range'
							/>
					</div>
					<div class='text-center mt-2'>
						<button class="btn btn-primary" type="submit">Generate Report</button>
					</div>
				</form>
			</div>
		</div>
		<div v-show="reportShowSection == 'result'">
			<div class='mb-3'>
				<button class='btn btn-primary' @click.prevent="reportShowSection = 'report'">Go back</button>
			</div>
			<div>
				<h2 class='text-center'>Total Orders: <span class='text-primary'>@{{ returnedResult.its_size }}</span></h2>
				<h2 class='text-center'>Total revenue: <span class='text-primary'>@{{returnedResult.total_revenue}}</span></h2>
			</div>
			<!-- @{{returnedResult}} -->
			<table class="table table-striped">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Date</th>
						<th scope="col">Sold Amount</th>
						<th scope="col">Action</th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="order in returnedResult.orders">
						<th scope="row">@{{order.index}}</th>
						<!-- <td>@{{(new Date(Date.parse(order.created_at))).toDateString().split(" ").slice(1,4).join(" ")}}</td> -->
						<td>@{{order.created_at}}</td>
						<td>@{{order.total_amount}} Taka</td>
						<td><a href="#" @click.prevent="goToOrderClicked(order.id)">Go To Order</a></td>
					</tr>
				</tbody>
			</table>
			<!-- <div class='mb&#45;3'> -->
			<!-- 	<button class='btn btn&#45;primary' @click.prevent="reportShowSection= 'productBrowse'">Browse by Product</button> -->
			<!-- </div> -->
		</div>
		<div v-show="reportShowSection == 'order'">
			{{-- <h2 class='text-center'>Order date and Time: <span class='text-success'>{{$order->created_at}}</span></h2> --}}
			{{-- <h2 class='text-center'>Order Amount: <span class='text-success'>{{$order->total_amount}} Taka</span></h2> --}}
			<div class='mb-3'>
				<button class='btn btn-primary' @click.prevent="reportShowSection = 'result'">Go back</button>
			</div>
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
					<tr v-for="product in returnedOrder.products">
						<th scope="row"><a href="#" @click.prevent="getProductSales(product.id)">@{{product.name}}</a></th>
						<!-- <td>@{{(new Date(Date.parse(order.created_at))).toDateString().split(" ").slice(1,4).join(" ")}}</td> -->
						<td>@{{product.pivot.quantity}}</td>
						<td>@{{product.price}}</td>
						<td>@{{product.pivot.price}}</td>
						<!-- <td><a href='/orders/@{{order.id}}'>Go To Order</a></td> -->
						<!-- <td><a :href="'/orders/'+order.id">Go To Order + @{{order.id}}</a></td> -->
					</tr>
				</tbody>
			</table>
		</div>
		<div v-show="reportShowSection == 'product'">
			<div class='mb-3'>
				<button class='btn btn-primary' @click.prevent="reportShowSection = 'order'">Go back</button>
			</div>
			<h1 class='text-center text-success'>@{{returnedProductReport.product_name}}</h1>
			<h3 class='text-center text-success'>Unit Price: <span class='text-dark'>@{{returnedProductReport.product_price}} Tk.</span></h3>
			<h3 class='text-center text-success'>Units Sold: <span class='text-dark'>@{{returnedProductReport.total_sold}} Pcs.</span></h3>
			<h3 class='text-center text-success'>Total Revenue: <span class='text-dark'>@{{returnedProductReport.total_amount}} Tk.</span></h3>
			{{-- <h2 class='text-center'>Order Amount: <span class='text-success'>{{$order->total_amount}} Taka</span></h2> --}}
			<table class="table table-striped">
				<thead>
					<tr>
						<th scope="col">Date</th>
						<th scope="col">Quantity</th>
						<th scope="col">Total Price</th>
						<!-- <th scope="col">Action</th> -->
					</tr>
				</thead>
				<tbody>
					<tr v-for="entry in returnedProductReport.order_entry">
						<th scope='row'>@{{(new Date(Date.parse(entry.created_at))).toDateString().split(" ").slice(1,4).join(" ")}}</th>
						<td>@{{entry.quantity}}</a></td>
						<td>@{{entry.price}}</a></td>
						<!-- <td><a href="#" @click.prevent="goToOrderClicked(order.id)">Go To Order</a></td> -->
					</tr>
				</tbody>
			</table>
		</div>

	</div>
@endsection
@include('footer')
