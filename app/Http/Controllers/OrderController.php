<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
  public function store(){
    $order = Order::create( request(['total_amount']) );
    foreach( request()->all() as $request ){
      $order->products()->attach($request['product_id'], ['quantity' => $request['quantity'], 'price' => $request['price']]);
    }

    return redirect('/home');
  }
}
