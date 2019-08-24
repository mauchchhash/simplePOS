<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function index()
  {
    //
  }

  public function create()
  {
    //
  }

  public function store(Request $request)
  {
    Product::create(
      request(['name', 'category', 'price'])
    );

    return redirect('/home');
  }

  public function show(Product $product)
  {
    //
  }

  public function edit(Product $product)
  {
    //
  }

  public function update(Request $request, Product $product)
  {
    $product->update(
      request([ 'name', 'category', 'price' ])
    );
    return redirect('home');
  }

  public function destroy(Product $product)
  {
    $product->delete();

    return redirect('home');
  }
}
