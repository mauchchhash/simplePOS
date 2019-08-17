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
  public function authenticated_user_can_add_products(){
    $this->withoutExceptionHandling();
    $this->be(factory(User::class)->create());

    $attributes = factory(Product::class)->raw();
    $this->post('/products', $attributes)->assertRedirect('/home');
  }
}
