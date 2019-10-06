@extends('layouts.app')

@section('content')
  <div class="row" id="pos-row">
    <div class="col-md-12" v-if="activeChoice == 'category'">
      <div class="row">
        @foreach($products as $product)
          @if($product->category == 'beverage')
            <div class='col-lg-3'>
              <div class="my-lg-2 card bg-primary" @click="addProduct('{{$product->name}}', '{{$product->id}}', '{{$product->price}}')">
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

    <div class="col-md-12" v-if="activeChoice == 'category'">
      <div class="row">
        @foreach($products as $product)
          @if($product->category == 'food')
            <div class='col-lg-3'>
              <div class="my-lg-2 card bg-warning" @click="addProduct('{{$product->name}}', '{{$product->id}}', '{{$product->price}}')">
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

    <div class="col-md-12" v-if="activeChoice == 'category'">
      <div class="row">
        @foreach($products as $product)
          @if($product->category == 'other')
            <div class='col-lg-3'>
              <div class="my-lg-2 card bg-success" @click="addProduct('{{$product->name}}', '{{$product->id}}', '{{$product->price}}')">
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
  </div>
@endsection
@include('footer')
