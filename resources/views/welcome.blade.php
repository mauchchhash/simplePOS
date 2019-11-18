@extends('layouts.app')

@section('content')
	<div class="row justify-content-center" id="pos-row">
		<div v-show="reportShowSection == 'report'" class='pt-3'>
			<h3>Please select your date range:</h3>
			<br>
			<!-- <div> -->
			<!-- 	<v&#45;date&#45;picker -->
			<!-- 		:value="null" -->
			<!-- 		mode="range" -->
			<!-- 		v&#45;model='range' -->
			<!-- 		/> -->
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
				<!-- <h2 class='text&#45;center'>Total products sold: <span class='text&#45;primary'>@{{returnedResult.total_products_sold}}</span></h2> -->
				<!-- <h2 class='text&#45;center'>Total revenue: <span class='text&#45;primary'>@{{returnedResult.total_revenue}}</span></h2> -->
			</div>
			@{{returnedResult}}
			<table class="table table-striped">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">First</th>
						<th scope="col">Last</th>
						<th scope="col">Handle</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">1</th>
						<td>Mark</td>
						<td>Otto</td>
						<td>@mdo</td>
					</tr>
					<tr>
						<th scope="row">2</th>
						<td>Jacob</td>
						<td>Thornton</td>
						<td>@fat</td>
					</tr>
					<tr>
						<th scope="row">3</th>
						<td>Larry</td>
						<td>the Bird</td>
						<td>@twitter</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
@endsection
@include('footer')
