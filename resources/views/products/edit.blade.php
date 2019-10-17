@extends('layouts.app')

@section('content')
  <!-- <h1 class="bg&#45;success">Update a product</h1> -->
  <div class="card bg-success">
    <div class="car-body text-center">
      <br>
      <h3 class="card-text text-white text-center">Update {{$product->name}}</h3>
      <br>
    </div>
  </div>
  <br>
  <form action="/products/{{$product->id}}" method="POST" class="form">
    @csrf
    @method('PATCH')

    <div class="form-group">
      <label for="product-name">Product name:</label>
      <input type="text" name='name' class="form-control" value={{$product->name}} id='product-name' required>
    </div>
    <div class="form-group">
      <label for="product-category">Product Category</label>
      <select name='category' class='form-control' id='product-category' required>
        @if ( $product->category == 'beverage' ):
          <option selected="selected">beverage</option>
        @else:
          <option>beverage</option>
        @endif

        @if ( $product->category == 'food' ):
          <option selected="selected">food</option>
        @else:
          <option>food</option>
        @endif

        @if ( $product->category == 'other' ):
          <option selected="selected">other</option>
        @else:
          <option>other</option>
        @endif
      </select>
    </div>
    <div class="form-group">
      <label for="product-price">Product Price:</label>
      <input type="text" name='price' class="form-control" value={{$product->price}} id='product-price' required>
    </div>
    <button class="btn btn-primary" type='submit'>Update Product</button>
  </form>
  <form method="POST" action="/products/{{$product->id}}">
    @method('DELETE')
    @csrf

    <div class='mt-2'>
      <button class="btn btn-danger" type='submit'>Delete Product</button>
    </div>
  </form>

  </form>
@endsection
@include('footer')
