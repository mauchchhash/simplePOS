@extends('layouts.app')

@section('content')
  <div class="row" id="pos-row">
    <div class="col-md-12" v-if="activeChoice == 'category'">
      <div class="row">
        @foreach($products as $product)
          @if($product->category == 'beverage')
            <div class='col-lg-3'>
              <div class="my-lg-2 card bg-primary">
                <a href="{{ url('/products/'.$product->id) }}">
                  <div class="card-body text-center">
                    <h3 class="card-text text-white">{{$product->name}}</h3>
                    <h6 class="card-text text-white">{{$product->price . ' Taka'}}</h6>
                  </div>
                </a>
              </div>
            </div>
          @endif
        @endforeach
      </div>
    </div>

    <div class="col-md-12" v-if="activeChoice == 'category'">
      <div class="row">
        @foreach($products as $product)
          @if($product->category == 'food')
            <div class='col-lg-3'>
              <div class="my-lg-2 card bg-warning">
                <a href="{{ url('/products/'.$product->id) }}">
                  <div class="card-body text-center">
                    <h3 class="card-text text-dark">{{$product->name}}</h3>
                    <h6 class="card-text text-dark">{{$product->price . ' Taka'}}</h6>
                  </div>
                </a>
              </div>
            </div>
          @endif
        @endforeach
      </div>
    </div>

    <div class="col-md-12" v-if="activeChoice == 'category'">
      <div class="row">
        @foreach($products as $product)
          @if($product->category == 'other')
            <div class='col-lg-3'>
              <div class="my-lg-2 card bg-success">
                <a href="{{ url('/products/'.$product->id) }}">
                  <div class="card-body text-center">
                    <h3 class="card-text text-white">{{$product->name}}</h3>
                    <h6 class="card-text text-white">{{$product->price . ' Taka'}}</h6>
                  </div>
                </a>
              </div>
            </div>
          @endif
        @endforeach
      </div>
    </div>
  </div>
@endsection
@include('footer')
