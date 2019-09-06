@extends('layouts.app')

@section('content')

  <div class="card-deck">
    <div class="card bg-primary">
      <a href="#">
        <div class="card-body text-center">
          <br>
          <h1 class="card-text text-white">Beverages</h1>
          <br>
        </div>
      </a>
    </div>
    <div class="card bg-warning">
      <a href="#">
        <div class="card-body text-center">
          <br>
          <h1 class="card-text text-dark">Foods</h1>
          <br>
        </div>
      </a>
    </div>
    <div class="card bg-success">
      <a href="#">
        <div class="card-body text-center">
          <br>
          <h1 class="card-text text-white">Others</h1>
          <br>
        </div>
      </a>
    </div>
  </div>
@endsection
