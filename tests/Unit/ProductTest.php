<?php

namespace Tests\Unit;

use App\Order;
use App\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
  use RefreshDatabase, WithFaker;

  /** @test */
  public function it_has_a_path(){
    $product = factory(Product::class)->create();
    $this->assertEquals('/products/'.$product->id, $product->path());
  }

  /** @test */
  public function it_has_an_edit_path(){
    $product = factory(Product::class)->create();
    $this->assertEquals('/products/edit/'.$product->id, $product->edit_path());
  }

  /** @test */
  public function it_will_be_in_multiple_orders(){
    $product = factory(Product::Class)->create();
    $this->assertInstanceOf(Collection::class, $product->orders);

    $order = factory(Order::Class)->create();
    $product->orders()->attach($order->id, [
      'quantity' => $this->faker->randomDigit,
      'price' => $this->faker->randomDigit
    ]);
    $this->assertInstanceOf(Order::class, $product->orders()->first());
  }
}
