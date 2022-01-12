@extends('layouts.master')
@section('content')

<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Dashboard-->
        <div class="row">
             <div class="card card-custom gutter-b w-100">
                <div class="card-header">
                    <h4 class="card-title">{{ __('User Details') }}</h4>
                </div>
                <div class="card-body">
                    <!--begin::Example-->
                    <div class="example mb-10">

                        <div class="example-preview">
                            <h5><strong>Name : </strong>{{$users->name}}</h5>
                            <h5><strong>Email : </strong>{{$users->email}}</h5>
                            <h5><strong>Phone No : </strong>{{$users->phone}}</h5>
                            <h5><strong>Type : </strong>{{$users->type}}</h5>
                            <h5><strong>Site : </strong>{{$users->sites? preg_replace('/[["]/', '',$users->sites->pluck('name')) : "--"}}</h5>
                            <h5><strong>Module : </strong>{{$users->modules ? preg_replace('/[["]/', '',$users->modules->pluck('name')) : "--"}}</h5>
                            <h5><strong>Category : </strong>{{$users->category}}</h5>
                        </div>

                    </div>
                    <!--end::Example-->
                </div>
            </div>
        </div>
        <!--end::Dashboard-->
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->
@endsection
