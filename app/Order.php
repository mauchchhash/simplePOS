<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $guarded = [];

  public function products(){
    return $this->belongsToMany(Product::class, 'order_entries');
  }

  public function path(){
    return '/orders/' . $this->id;
  }
}
