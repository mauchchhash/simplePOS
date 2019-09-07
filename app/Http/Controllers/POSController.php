<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use JavaScript;

class POSController extends Controller
{
  public function index(){
    JavaScript::put([
      'products' => Product::all(),
      'foo' => 'bar'
    ]);
    $products = Product::all();
    return view('welcome', compact('products'));
  }
}
