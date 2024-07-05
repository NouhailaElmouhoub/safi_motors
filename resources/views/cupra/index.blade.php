@extends('layouts.app')
@section('title', $viewData["title"])
@section('subtitle', $viewData["subtitle"])
@section('content')
<div class="row justify-content-center ">
  @foreach ($viewData["cupra"] as $sk)
  <div class="col-md-4 col-lg-10 mb-2">
    <div class="card">
      <img src="{{ asset('/storage/'.$sk->getImage()) }}" class="card-img-top img-card">
      <div class="card-body text-center">
        <a href="{{ route('cupra.show', ['id'=> $sk->getId()]) }}"
          class="btn btn-primary btn-lg btn-block">{{ $sk->getName() }}</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
