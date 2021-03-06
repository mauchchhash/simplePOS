<?php

namespace Tests\Feature;

use App\User;
use App\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductsTest extends TestCase
{
  use RefreshDatabase;

  /** @test */
  public function guest_cant_add_products(){
    $attributes = factory(Product::class)->raw();
    $this->post('/products', $attributes)->assertRedirect('/login');
  }

  /** @test */
  public function guest_cant_delete_products(){
    // $this->withoutExceptionHandling();
    $this->be(factory(User::class)->create());

    $attributes = factory(Product::class)->raw();
    $this->post('/products', $attributes)->assertRedirect('/home');

    $this->assertDatabaseHas('products', $attributes);
    auth()->logout();

    $product = Product::where('name', $attributes['name'])->first();
    $this->delete($product->path())->assertRedirect('/login');
  }

  /** @test */
  public function guest_cant_update_products(){
    // $this->withoutExceptionHandling();
    $this->be(factory(User::class)->create());

    $attributes = factory(Product::class)->raw();
    $this->post('/products', $attributes)->assertRedirect('/home');

    $this->assertDatabaseHas('products', $attributes);
    auth()->logout();

    $product = Product::where('name', $attributes['name'])->first();
    $attributes['name'] = 'papa chicken';
    $this->patch($product->path(), $attributes)->assertRedirect('/login');
  }

  /** @test */
  public function guest_cant_goto_add_product_page(){
    $this->get('/products')->assertRedirect('/login');
  }

  /** @test */
  public function guest_cant_goto_update_product_page(){
    // $this->markTestIncomplete();
    $this->be(factory(User::class)->create());

    $attributes = factory(Product::class)->raw();
    $this->post('/products', $attributes)->assertRedirect('/home');

    $this->assertDatabaseHas('products', $attributes);
    auth()->logout();

    $product = Product::where('name', $attributes['name'])->first();
    $this->get($product->edit_path())->assertRedirect('/login');
  }

  /** @test */
  public function guest_cant_goto_create_product_page(){
    $this->get('/products/create')->assertRedirect('/login');
  }

  /** @test */
  public function authenticated_user_can_add_products(){
    $this->withoutExceptionHandling();
    $this->be(factory(User::class)->create());

    $attributes = factory(Product::class)->raw();
    $this->post('/products', $attributes)->assertRedirect('/home');

    $this->assertDatabaseHas('products', $attributes);
  }

  /** @test */
  public function authenticated_user_can_delete_products(){
    $this->withoutExceptionHandling();
    $this->be(factory(User::class)->create());

    $attributes = factory(Product::class)->raw();
    $this->post('/products', $attributes)->assertRedirect('/home');

    $this->assertDatabaseHas('products', $attributes);

    $product = Product::where('name', $attributes['name'])->first();
    $this->delete($product->path())->assertRedirect('/home');
  }

  /** @test */
  public function authenticated_user_can_update_products(){
    $this->withoutExceptionHandling();
    $this->be(factory(User::class)->create());

    $attributes = factory(Product::class)->raw();
    $this->post('/products', $attributes)->assertRedirect('/home');

    $this->assertDatabaseHas('products', $attributes);

    $product = Product::where('name', $attributes['name'])->first();
    $attributes['name'] = 'papa chicken';
    $this->patch($product->path(), $attributes)->assertRedirect('/home');
    $this->assertDatabaseHas('products', $attributes);
  }

  /** @test */
  public function authenticated_user_can_goto_add_products_page(){
    $this->be(factory(User::class)->create());
    $this->get('/products')->assertStatus(200);
  }

  /** @test */
  public function authenticated_user_can_goto_update_product_page(){
    // $this->markTestIncomplete();
    $this->be(factory(User::class)->create());

    $attributes = factory(Product::class)->raw();
    $this->post('/products', $attributes)->assertRedirect('/home');

    $this->assertDatabaseHas('products', $attributes);

    $product = Product::where('name', $attributes['name'])->first();
    $this->get($product->edit_path())->assertStatus(200);
  }

  /** @test */
  public function authenticated_user_can_goto_create_product_page(){
    $this->be(factory(User::class)->create());
    $this->get('/products/create')->assertStatus(200);
  }
}
