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
		</div>
	</div>
@endsection
@include('footer')
