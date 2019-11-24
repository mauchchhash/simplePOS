<?php

namespace App;

use App\Order;
use App\Product;
use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderEntry extends Pivot
{
	protected $table = 'order_entries';
	protected $guarded = [];
    //
	public function product(){
		return $this->belongsTo(Product::class);
	}
    //
	public function order(){
		return $this->belongsTo(Order::class);
	}
}
