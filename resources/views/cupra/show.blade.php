@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{{ asset('/storage/'.$viewData["cupra"]->getImage()) }}" class="img-fluid rounded-start" alt="{{ $viewData["cupra"]->getName() }}">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">
          {{ $viewData["cupra"]->getName() }} 
        </h5>
        <p class="card-text">{{ $viewData["cupra"]->getDescription() }}</p>
        <p class="card-text">
          <form method="GET">
            <div class="row">
                @csrf
                <div class="col-auto">
                    {{-- Quantity input (if needed) --}}
                    {{-- <div class="input-group col-auto">
                        <div class="input-group-text">Quantity</div>
                        <input type="number" min="1" max="10" class="form-control quantity-input" name="quantity" value="1">
                    </div> --}}
                </div>
                <div class="col-auto">
                    {{-- Add to cart button (if needed) --}}
                    {{-- <button class="btn bg-primary text-white" type="submit">Add to cart</button> --}}
                </div>
                @if($viewData["cupra"]->getPdf())
                    <a href="{{ asset('storage/' . $viewData["cupra"]->getPdf()) }}" target="_blank" class="btn btn-secondary btn-lg btn-block mt-2">View PDF</a>
                @endif
            </div>
        </form>
        </p>
      </div>
    </div>
  </div>
</div>
@endsection
