<?php

namespace App;

use App\Order;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $guarded = [];

  public function path(){
    return '/products/' . $this->id;
  }

  public function orders(){
    return $this->belongsToMany(Order::class, 'order_entries');
  }
}
