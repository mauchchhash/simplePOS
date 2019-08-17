<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsersTest extends TestCase
{
  use RefreshDatabase;

  /** @test */
  public function guest_cant_visit_homepage(){
    // $this->withoutExceptionHandling();
    $this->get('/home')->assertRedirect('/login');
  }

  /** @test */
  public function user_can_visit_homepage(){
    $this->be(factory(User::class)->create());
    $this->get('/home')->assertStatus(200);
  }

}