@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="font-weight-bold">DASHBOARD</h2>


<div class="row" id="explore">
        <div class="col-xl-3 col-md-3 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-music"></i>
              </div>
              <div class="mr-5">Music</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="/send">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-md-3 mb-3">
          <div class="card bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-music"></i>
              </div>
              <div class="mr-5">Albums</div>
            </div>
            <a class="card-footer text-dark clearfix small z-1" href="/dashboard">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-md-3 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-calendar"></i>
              </div>
              <div class="mr-5">Events</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="/login">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-md-3 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-user"></i>
              </div>
              <div class="mr-5">Bio</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="/about">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        </div>
<!--end of cards-->
                </div>
            </div>
        </div>
</div>
@endsection
