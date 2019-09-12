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
    dd($request->all());
    // $order = Order::create( request(['total_amount']) );
    // foreach( request()->all() as $request ){
    //   $order->products()->attach($request['product_id'], ['quantity' => $request['quantity'], 'price' => $request['price']]);
    // }

    return redirect('/home');
  }
}
