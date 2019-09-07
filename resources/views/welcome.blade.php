@extends('layouts.app')

@section('content')

  <div class="row" id="pos-row">
    <div class="card-deck col-md-8" v-if="activeChoice == 'category'">
      <div class="card bg-primary">
        <a href="#">
          <div class="card-body text-center" @click="setBeverage()">
            <br>
            <h2 class="card-text text-white">Beverages</h2>
            <br>
          </div>
        </a>
      </div>
      <div class="card bg-warning">
        <a href="#">
          <div class="card-body text-center" @click="setFood()">
            <br>
            <h1 class="card-text text-dark">Foods</h1>
            <br>
          </div>
        </a>
      </div>
      <div class="card bg-success">
        <a href="#">
          <div class="card-body text-center" @click="setOther()">
            <br>
            <h1 class="card-text text-white">Others</h1>
            <br>
          </div>
        </a>
      </div>
    </div>

    <div class="col-md-8" v-if="activeChoice == 'beverage'">

      <div class="row">
        @foreach($products as $product)
          @if($product->category == 'beverage')
            <div class='col-lg-4'>
              <div class="my-lg-2 card bg-primary">
                <!-- <a href="#"> -->
                <div class="card-body text-center">
                  <br>
                  <h1 class="card-text text-white">{{$product->name}}</h1>
                  <br>
                </div>
                <!-- </a> -->
              </div>
            </div>
          @endif
        @endforeach
        <!-- <div class='col&#45;lg&#45;4'> -->
        <!--   <div class="my&#45;lg&#45;2 card bg&#45;primary"> -->
        <!--     <!&#45;&#45; <a href="#"> &#45;&#45;> -->
        <!--     <div class="card&#45;body text&#45;center"> -->
        <!--       <br> -->
        <!--       <h1 class="card&#45;text text&#45;white">Sprite</h1> -->
        <!--       <br> -->
        <!--     </div> -->
        <!--     <!&#45;&#45; </a> &#45;&#45;> -->
        <!--   </div> -->
        <!-- </div> -->
        <!-- <div class='col&#45;lg&#45;4'> -->
        <!--   <div class="my&#45;lg&#45;2 card bg&#45;primary"> -->
        <!--     <!&#45;&#45; <a href="#"> &#45;&#45;> -->
        <!--     <div class="card&#45;body text&#45;center"> -->
        <!--       <br> -->
        <!--       <h1 class="card&#45;text text&#45;white">Dew</h1> -->
        <!--       <br> -->
        <!--     </div> -->
        <!--     <!&#45;&#45; </a> &#45;&#45;> -->
        <!--   </div> -->
        <!-- </div> -->
        <!-- <div class='col&#45;lg&#45;4'> -->
        <!--   <div class="my&#45;lg&#45;2 card bg&#45;primary"> -->
        <!--     <!&#45;&#45; <a href="#"> &#45;&#45;> -->
        <!--     <div class="card&#45;body text&#45;center"> -->
        <!--       <br> -->
        <!--       <h1 class="card&#45;text text&#45;white">Coke</h1> -->
        <!--       <br> -->
        <!--     </div> -->
        <!--     <!&#45;&#45; </a> &#45;&#45;> -->
        <!--   </div> -->
        <!-- </div> -->
      </div>
    </div>

    <div class="card-deck col-md-8" v-if="activeChoice == 'food'">
      <div class="card bg-warning col-md-9">
        <!-- <a href="#"> -->
        <div class="card-body text-center">
          <br>
          <h1 class="card-text text-white">Burger</h1>
          <br>
        </div>
        <!-- </a> -->
      </div>
      <div class="card bg-warning col-md-9">
        <!-- <a href="#"> -->
        <div class="card-body text-center">
          <br>
          <h1 class="card-text text-white">Pizza</h1>
          <br>
        </div>
        <!-- </a> -->
      </div>
      <div class="card bg-warning col-md-9">
        <!-- <a href="#"> -->
        <div class="card-body text-center">
          <br>
          <h1 class="card-text text-white">Hot Dog</h1>
          <br>
        </div>
        <!-- </a> -->
      </div>
    </div>

    <div class="card-deck col-md-8" v-if="activeChoice == 'other'">
      <div class="card bg-success col-md-9">
        <!-- <a href="#"> -->
        <div class="card-body text-center">
          <br>
          <h1 class="card-text text-white">Water</h1>
          <br>
        </div>
        <!-- </a> -->
      </div>
      <div class="card bg-success col-md-9">
        <!-- <a href="#"> -->
        <div class="card-body text-center">
          <br>
          <h1 class="card-text text-white">Ice Cream</h1>
          <br>
        </div>
        <!-- </a> -->
      </div>
      <div class="card bg-success col-md-9">
        <!-- <a href="#"> -->
        <div class="card-body text-center">
          <br>
          <h1 class="card-text text-white">Others</h1>
          <br>
        </div>
        <!-- </a> -->
      </div>
    </div>
    <div class="col-md-4 bg-info">
      <h2 class="text-center my-2 text-white">Order List</h2>
    </div>
  </div>
@endsection
