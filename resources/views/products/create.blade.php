@extends('layouts.app')

@section('content')
  <h1 class="bg-success">Add a product</h1>
  <br>
  <form action="/products" method="POST" class="form">
    @csrf

    <div class="form-group">
      <label for="product-name">Product name:</label>
      <input type="text" name='name' class="form-control" placeholder='Product Name' id='product-name' required>
    </div>
    <div class="form-group">
      <label for="product-category">Product Category</label>
      <select name='category' class='form-control' id='product-category' required>
        <option>beverage</option>
        <option>food</option>
        <option>other</option>
      </select>
    </div>
    <div class="form-group">
      <label for="product-price">Product Price:</label>
      <input type="text" name='price' class="form-control" placeholder='Product Price' id='product-price' required>
    </div>
    <button class="btn btn-primary" type='submit'>Add Product</button>
  </form>
@endsection
@include('footer')
