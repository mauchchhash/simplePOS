<?php

namespace App;

use App\OrderEntry;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $guarded = [];

  public function products(){
	  return $this->belongsToMany(Product::class, 'order_entries')->using(OrderEntry::class)->withPivot('quantity', 'price')->withTimestamps();
	  // return $this->belongsToMany(Product::class, 'order_entries')->using(OrderEntry::class)->withPivot('quantity', 'price', 'created_at', 'updated_at')->withTimestamps();
  }

  public function path(){
    return '/orders/' . $this->id;
  }
}
