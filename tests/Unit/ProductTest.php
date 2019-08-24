<?php

namespace Tests\Unit;

use App\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
  use RefreshDatabase;

  /** @test */
  public function it_has_a_path(){
    $product = factory(Product::class)->create();
    $this->assertEquals('/products/'.$product->id, $product->path());
  }
}
