@extends('layouts.app')

@section('content')

  <div class="row" id="pos-row">
    <!-- <div> -->
    <!--   @{{activeChoice}} -->
    <!-- </div> -->
    <div class="card-deck col-md-8" v-if="activeChoice == 'category'">
      <div class="card bg-primary">
        <a href="#">
          <div class="card-body text-center" @click="setBeverage">
            <br>
            <h2 class="card-text text-white">Beverages</h2>
            <br>
          </div>
        </a>
      </div>
      <div class="card bg-warning">
        <a href="#">
          <div class="card-body text-center" @click="setFood">
            <br>
            <h1 class="card-text text-dark">Foods</h1>
            <br>
          </div>
        </a>
      </div>
      <div class="card bg-success">
        <a href="#">
          <div class="card-body text-center" @click="setOther">
            <br>
            <h1 class="card-text text-white">Others</h1>
            <br>
          </div>
        </a>
      </div>
    </div>

    <div class="col-md-8" v-if="activeChoice == 'beverage'">
      <div class='col-lg-12'>
        <div class="my-lg-1 card bg-secendary" @click='setCategory'>
          <a href="#">
            <!-- <div class="card&#45;body text&#45;center"> -->
            <br>
            <h4 class="card-text text-dark text-center">Go Back</h4>
            <br>
            <!-- </div> -->
          </a>
        </div>
      </div>
      <div class="row">
        @foreach($products as $product)
          @if($product->category == 'beverage')
            <div class='col-lg-4'>
              <div class="my-lg-2 card bg-primary">
                <a href="#">
                <div class="card-body text-center">
                  <h3 class="card-text text-white">{{$product->name}}</h3>
                  <h3 class="card-text text-white">{{$product->price . ' Taka'}}</h3>
                </div>
                </a>
              </div>
            </div>
          @endif
        @endforeach
      </div>
    </div>

    <div class="card-deck col-md-8" v-if="activeChoice == 'food'">
      <div class='col-lg-12'>
        <div class="my-lg-1 card bg-secendary" @click='setCategory'>
          <a href="#">
            <!-- <div class="card&#45;body text&#45;center"> -->
            <br>
            <h4 class="card-text text-dark text-center">Go Back</h4>
            <br>
            <!-- </div> -->
          </a>
        </div>
      </div>
      <div class="row">
        @foreach($products as $product)
          @if($product->category == 'food')
            <div class='col-lg-4'>
              <div class="my-lg-2 card bg-warning">
                <a href="#">
                <div class="card-body text-center">
                  <h3 class="card-text text-dark">{{$product->name}}</h3>
                  <h3 class="card-text text-dark">{{$product->price . ' Taka'}}</h3>
                </div>
                </a>
              </div>
            </div>
          @endif
        @endforeach
      </div>
    </div>

    <div class="card-deck col-md-8" v-if="activeChoice == 'other'">
      <div class='col-lg-12'>
        <div class="my-lg-1 card bg-secendary" @click='setCategory'>
          <a href="#">
            <!-- <div class="card&#45;body text&#45;center"> -->
            <br>
            <h4 class="card-text text-dark text-center">Go Back</h4>
            <br>
            <!-- </div> -->
          </a>
        </div>
      </div>
      <div class="row">
        @foreach($products as $product)
          @if($product->category == 'other')
            <div class='col-lg-4'>
              <div class="my-lg-2 card bg-success">
                <a href="#">
                <div class="card-body text-center">
                  <h3 class="card-text text-white">{{$product->name}}</h3>
                  <h3 class="card-text text-white">{{$product->price . ' Taka'}}</h3>
                </div>
                </a>
              </div>
            </div>
          @endif
        @endforeach
      </div>
    </div>
    <div class="col-md-4 bg-info">
      <h2 class="text-center my-2 text-white">Order List</h2>
    </div>
  </div>
@endsection
