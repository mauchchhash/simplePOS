<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function index()
  {
    \JavaScript::put([
      'products' => Product::all(),
      'foo' => 'bar'
    ]);
    $products = Product::all();
    return view('products.index', compact('products'));
  }

  public function create()
  {
    return view('products.create');
  }

  public function store(Request $request)
  {
    Product::create(
      request(['name', 'category', 'price'])
    );

    return redirect('/');
  }

  public function show(Product $product)
  {
  }

  public function edit(Product $product)
  {
    return view('products.edit', compact('product'));
  }

  public function update(Request $request, Product $product)
  {
    $product->update(
      request([ 'name', 'category', 'price' ])
    );
    return redirect('/products');
  }

  public function destroy(Product $product)
  {
    $product->delete();

    return redirect('/products');
  }
}
