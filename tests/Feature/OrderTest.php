<?php

namespace Tests\Feature;

use App\Order;
use App\Product;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{
  use RefreshDatabase, WithFaker;

  /** @test */
  public function guest_cant_add_existing_products_in_an_order(){
    // $this->withoutExceptionHandling();
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

    auth()->logout();

    $id1 = Product::where('name', $attributes1['name'])->first()->id;
    $id2 = Product::where('name', $attributes2['name'])->first()->id;
    $id3 = Product::where('name', $attributes3['name'])->first()->id;

    $quantity1 = $this->faker->randomDigit();
    $quantity2 = $this->faker->randomDigit();
    $quantity3 = $this->faker->randomDigit();

    $orderAttributes = [
      [ 'product_id' => $id1, 'quantity' => $quantity1, 'price' => $this->faker->randomDigit],
      [ 'product_id' => $id2, 'quantity' => $quantity2, 'price' => $this->faker->randomDigit],
      [ 'product_id' => $id3, 'quantity' => $quantity3, 'price' => $this->faker->randomDigit],
    ];
    $orderAttributes['total_amount'] = $this->faker->randomDigit;

    $this->post('/orders', $orderAttributes)->assertRedirect('/login');
    $this->assertDatabaseMissing('order_entries', [ 'product_id' => $id1, 'quantity' => $quantity1]);
    $this->assertDatabaseMissing('order_entries', [ 'product_id' => $id2, 'quantity' => $quantity2]);
    $this->assertDatabaseMissing('order_entries', [ 'product_id' => $id3, 'quantity' => $quantity3]);
  }

  /** @test */
  public function guest_cant_goto_create_order_page(){
    $this->get('/orders/create')->assertRedirect('/login');
  }

  /** @test */
  public function user_can_add_existing_products_in_an_order(){
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

    $orderAttributes = [ 'products' => [
      $id1 => ['quantity' => $quantity1, 'priceInOrder' => $this->faker->randomDigit],
      $id1 => ['quantity' => $quantity2, 'priceInOrder' => $this->faker->randomDigit],
      $id1 => ['quantity' => $quantity3, 'priceInOrder' => $this->faker->randomDigit],
    ]
  ];
    $orderAttributes['total_amount'] = $this->faker->randomDigit;

    $this->post( '/orders', $orderAttributes)->assertRedirect('/');
    $this->assertDatabaseHas('order_entries', [ 'product_id' => $id1, 'quantity' => $quantity1]);
    // dd('hi');
    $this->assertDatabaseHas('order_entries', [ 'product_id' => $id2, 'quantity' => $quantity2]);
    $this->assertDatabaseHas('order_entries', [ 'product_id' => $id3, 'quantity' => $quantity3]);
  }

  /** @test */
  public function authenticated_user_can_goto_create_orders_page(){
    $this->withoutExceptionHandling();
    $this->be(factory(User::class)->create());
    $this->get('/orders/create')->assertStatus(200);
  }

}
