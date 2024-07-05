@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<section class="content">
  <!-- Default box -->
  <div class="container-fluid">
    <div class="row">
      <!-- Total Orders -->
      <div class="col-lg-4 col-6">
        <div class="small-box card text-white bg-primary">
          <div class="inner">
            <h3>5</h3>
            <p>Marques</p>
          </div>
          <div class="icon">
            
          </div>
          <a href="#" class="small-box-footer text-white"></a>
        </div>
      </div>
      
      <!-- Total Customers -->
      <div class="col-lg-4 col-6">
        <div class="small-box card text-white bg-success">
          <div class="inner">
            <h3>4</h3>
            <p>Finitions</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="#" class="small-box-footer text-white"></a>
        </div>
      </div>
      
      <!-- Total Sale -->
     
    </div>
  </div>
  <!-- /.card -->
</section>
@endsection

<!-- Additional CSS -->
<style>
  .small-box {
    position: relative;
    display: block;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
  
  .small-box .inner {
    padding: 10px;
  }
  
  .small-box .icon {
    top: 10px;
    right: 10px;
    z-index: 0;
    font-size: 60px;
    position: absolute;
    color: rgba(0, 0, 0, 0.15);
  }
  
  .small-box-footer {
    display: block;
    position: relative;
    padding: 10px 0;
    text-align: center;
    color: white;
    text-decoration: none;
    z-index: 10;
    background: rgba(0, 0, 0, 0.1);
  }
</style>
