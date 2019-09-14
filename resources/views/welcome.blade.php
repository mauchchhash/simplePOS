@extends('layouts.app')

@section('content')
  <div class="row" id="pos-row">
    <div class="card-deck col-md-8" v-if="activeChoice == 'category'">
      <div class="card bg-primary" @click="setBeverage">
        <a href="#">
          <div class="card-body text-center">
            <br>
            <h2 class="card-text text-white">Beverages</h2>
            <br>
          </div>
        </a>
      </div>
      <div class="card bg-warning" @click="setFood">
        <a href="#">
          <div class="card-body text-center">
            <br>
            <h1 class="card-text text-dark">Foods</h1>
            <br>
          </div>
        </a>
      </div>
      <div class="card bg-success" @click="setOther">
        <a href="#">
          <div class="card-body text-center">
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
    <div class="card col-md-4 bg-info">
      <h2 class="card text-center my-2 text-dark">Order List</h2>
      <div class="text-center text-white">
        <form action="/orders" method="POST">
          @csrf
          <div class='container'>
            <div v-for="product in productsInOrder">
              <div class='row'>
                <!-- <div class="col&#45;sm&#45;4"> -->
                <div class='form-group'>
                  <!-- <input type="number" :name="'products['+ product.id +']'" v&#45;model.number='product.quantity' @change="updatePrice(product.id, product.quantity)">@{{product.name}} -->
                  <input type="number" :name="'products['+ product.id +'][quantity]'" v-model.number='product.quantity' @change="updatePrice(product.id, product.quantity)">@{{product.name}}
                  <input type="number" :name="'products['+ product.id +'][priceInOrder]'" v-model.number='product.priceInOrder'>Taka
                </div>
                <!-- </div> -->
              </div>
            </div>
            Total: <input type="number" name="total_amount" v-model.number='orderAmount'>Taka
            Cash:  <input type="number" v-model.number='cashByCustomer'>Taka
            <p>--------------------------------------------</p>
            Change:  <input type="number" v-model.number='changeMoney'>Taka
          </div>
          <button type="submit">Submit</button>
        </form>
      </div>
    </div>
  </div>
@endsection
@include('footer')
