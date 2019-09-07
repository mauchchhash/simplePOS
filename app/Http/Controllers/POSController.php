<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class POSController extends Controller
{
  public function index(){
    $products = Product::all();
    return view('welcome', compact('products'));
  }
}
