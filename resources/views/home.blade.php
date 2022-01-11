@extends('layouts.master')

@section('content')
<!-- Greetings Card starts -->
<div class="col-lg-12 col-md-12 col-sm-12">
    <div class="card card-congratulations">
        <div class="card-body text-center">
            <div class="avatar avatar-xl bg-primary shadow">
                <div class="avatar-content">
                    <i data-feather="award" class="font-large-1"></i>
                </div>
            </div>
            <div class="text-center">
                <h1 class="mb-1 text-white">Welcome {{auth()->user()->name}}</h1>
            </div>
        </div>
    </div>
</div>
<!-- Greetings Card ends -->
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-4 col-sm-4 col-12">
            <div class="card">
                <div class="card-header flex-column align-items-start pb-0">
                    <div class="avatar bg-light-primary p-50 m-0">
                        <div class="avatar-content">
                            <i data-feather="users" class="font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="font-weight-bolder mt-1">{{ $t1 }}</h2>
                    <p class="card-text">T1</p>
                </div>
                <div id="line-area-chart-1"></div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4 col-12">
            <div class="card">
                <div class="card-header flex-column align-items-start pb-0">
                    <div class="avatar bg-light-success p-50 m-0">
                        <div class="avatar-content">
                            <i data-feather="circle" class="font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="font-weight-bolder mt-1">{{ $t2 }}</h2>
                    <p class="card-text">T2</p>
                </div>
                <div id="line-area-chart-2"></div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-4 col-12">
            <div class="card">
                <div class="card-header flex-column align-items-start pb-0">
                    <div class="avatar bg-light-danger p-50 m-0">
                        <div class="avatar-content">
                            <i data-feather="thermometer" class="font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="font-weight-bolder mt-1">{{ $t3 }}</h2>
                    <p class="card-text">T3</p>
                </div>
                <div id="line-area-chart-3"></div>
            </div>
        </div>
    </div>
</div>
<!-- Greetings Card ends -->
<div class="container-fluid">
    <div class="row justify-content-center">
        <div id="chart"></div>
    </div>
</div>

@endsection
