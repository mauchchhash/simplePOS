<?php

namespace Tests\Unit;

use App\Order;
use App\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{
  use RefreshDatabase;

  /** @test */
  public function an_order_will_have_multiple_products(){
    $order = factory(Order::Class)->create();
    $this->assertInstanceOf(Collection::class, $order->products);

    $product = factory(Product::Class)->create();
    $order->products()->attach($product->id);
    $this->assertInstanceOf(Product::class, $order->products()->first());
  }
}
