<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
  public function create(){
    // return view('orders.create');
  }

  public function store(Request $request){
    $order = Order::create( request(['total_amount']) );
    // dd($request['products']);
    foreach($request['products'] as $key => $product){
      $order->products()->attach($key, ['quantity' => $product['quantity'], 'price' => $product['priceInOrder']]);
    }
    // foreach( request()->all() as $request ){
    //   $order->products()->attach($request['product_id'], ['quantity' => $request['quantity'], 'price' => $request['price']]);
    // }

    return redirect('/');
  }
}
