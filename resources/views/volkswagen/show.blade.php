@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{ asset('/storage/'.$viewData["volkswagen"]->getImage()) }}" class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
          {{ $viewData["volkswagen"]->getName() }} 
        </h5>
        <p class="card-text">{{ $viewData["volkswagen"]->getDescription() }}</p>
        <p class="card-text">
        <form method="POST" action="{{ route('cart.add', ['id'=> $viewData['volkswagen']->getId()]) }}">
          <div class="row">
            @csrf
            <div class="col-auto">
              {{-- <div class="input-group col-auto">
                <div class="input-group-text">Quantity</div>
                <input type="number" min="1" max="10" class="form-control quantity-input" name="quantity" value="1">
              </div> --}}
              @if($viewData["volkswagen"]->getPdf())
              <a href="{{ asset('storage/' . $viewData["volkswagen"]->getPdf()) }}" target="_blank" class="btn btn-secondary btn-lg btn-block mt-2">View PDF</a>
          @endif
            </div>
            {{-- <div class="col-auto">
              <button class="btn bg-primary text-white" type="submit">Add to cart</button>
            </div> --}}
          </div>
        </form>
        </p>
      </div>
    </div>
  </div>
</div>
@endsection
