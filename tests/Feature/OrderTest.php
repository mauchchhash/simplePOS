<?php

namespace Tests\Feature;

use App\Product;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{
  use RefreshDatabase, WithFaker;

  /** @test */
  public function user_can_add_existing_products_in_an_order(){

    // $this->markTestIncomplete();
    $this->withoutExceptionHandling();

    $this->withoutExceptionHandling();
    $this->be(factory(User::class)->create());

    $attributes1 = factory(Product::class)->raw();
    $this->post('/products', $attributes1)->assertRedirect('/home');
    $this->assertDatabaseHas('products', $attributes1);

    $attributes2 = factory(Product::class)->raw();
    $this->post('/products', $attributes2)->assertRedirect('/home');
    $this->assertDatabaseHas('products', $attributes2);

    $attributes3 = factory(Product::class)->raw();
    $this->post('/products', $attributes3)->assertRedirect('/home');
    $this->assertDatabaseHas('products', $attributes3);

    $id1 = Product::where('name', $attributes1['name'])->first()->id;
    $id2 = Product::where('name', $attributes2['name'])->first()->id;
    $id3 = Product::where('name', $attributes3['name'])->first()->id;
    
    $quantity1 = $this->faker->randomDigit();
    $quantity2 = $this->faker->randomDigit();
    $quantity3 = $this->faker->randomDigit();

    $orderAttributes = [
      [ 'product_id' => $id1, 'quantity' => $quantity1],
      [ 'product_id' => $id2, 'quantity' => $quantity2],
      [ 'product_id' => $id3, 'quantity' => $quantity3]
    ];
    $this->post('/orders', $orderAttributes)->assertRedirect('/home');
    $this->assertDatabaseHas('order_entries', [ 'product_id' => $id1, 'quantity' => $quantity1]);
    $this->assertDatabaseHas('order_entries', [ 'product_id' => $id2, 'quantity' => $quantity2]);
    $this->assertDatabaseHas('order_entries', [ 'product_id' => $id3, 'quantity' => $quantity3]);

  }
}
