@extends('layouts.admin')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
<div class="card">
    <div class="card-body">
<p class="h3 mb-4">
MY DASHBOARD
</p>
            <div class="row" id="explore">
                    <div class="col-xl-3 col-md-3 mb-3">
                      <div class="card text-white bg-primary o-hidden h-100">
                        <div class="card-body">
                          <div class="card-body-icon">
                            <i class="fa fa-fw fa-music"></i>
                          </div>
                          <div class="mr-5">Music</div>
                        </div>
                    <a class="card-footer text-white clearfix small z-1" href="{{route('music')}}">
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
                        <a class="card-footer text-dark clearfix small z-1" href="{{route('album')}}">
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
                        <a class="card-footer text-white clearfix small z-1" href="{{route('event')}}">
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
                            <i class="fa fa-cog"></i>
                          </div>
                          <div class="mr-5">Settings</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="#">
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

</div>               </div>
</div>
@endsection
