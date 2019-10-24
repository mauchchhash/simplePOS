@extends('layouts.app')

@section('content')
  <div class="row" id="pos-row">
    <div class="col-md-8" v-if="activeChoice == 'category'">
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
                    <h6 class="card-text text-white">{{$product->price . ' Taka'}}</h6>
                  </div>
                </a>
              </div>
            </div>
          @endif
        @endforeach
      </div>
    </div>

    <div class="col-md-8" v-if="activeChoice == 'food'">
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
                    <h6 class="card-text text-dark">{{$product->price . ' Taka'}}</h6>
                  </div>
                </a>
              </div>
            </div>
          @endif
        @endforeach
      </div>
    </div>

    <div class="col-md-8" v-if="activeChoice == 'other'">
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
                    <h6 class="card-text text-white">{{$product->price . ' Taka'}}</h6>
                  </div>
                </a>
              </div>
            </div>
          @endif
        @endforeach
      </div>
    </div>
    <div class="card col-md-4 bg-white">
      <h2 class="card text-center my-2 text-dark">Order List</h2>
      <div class="text-center text-dark">
        <form action="/orders" method="POST">
          @csrf
          <div class='container-fluid'>
            <div v-for="product in productsInOrder">
              <div class="row">
                <div class="col-3 px-0 border">
                    @{{product.name}}
                </div>
                <div class="col-7 px-0">
                  <input type="number" :name="'products['+ product.id +'][quantity]'" v-model.number='product.quantity' @change="updatePrice(product.id, product.quantity)">
                  <input type="number" :name="'products['+ product.id +'][priceInOrder]'" v-model.number='product.priceInOrder'>
                </div>
                <div class="col-2 px-0">
                  <p>Qty
                  <button type="button" class="close text-danger" aria-label="Close" @click=removeFromOrder(product.id)>
                    <span aria-hidden="true">&times;</span>
                  </button>
                  </p>
                  <p>Tk</p>
                </div>
              </div>
            </div>

            <p>--------------------------------------------</p>
            <div class="row">
              <div class="col-3 px-0 border">
                <p>Total:</p>
                <p>Cash:</p>
              </div>
              <div class="col-7 px-0">
                <input type="number" name="total_amount" v-model.number='orderAmount'>
                <input type="number" v-model.number='cashByCustomer'>
              </div>
              <div class="col-2 px-0">
                <p>Tk</p>
                <p>Tk</p>
              </div>
            </div>
            <!-- Total: <input type="number" name="total_amount" v&#45;model.number='orderAmount'>Taka -->
            <!-- Cash:  <input type="number" v&#45;model.number='cashByCustomer'>Taka -->
            <p>--------------------------------------------</p>
            Change:  <input type="number" v-model.number='changeMoney'>Taka
          </div>
          <div>
            <button class='btn btn-info mt-1' type="submit">Confirm Order</button>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
@include('footer')
