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
                    <div class="card-title">
                        <h3 class="card-label">User Detail</h3>
                    </div>
                </div>
                <div class="card-body">
                    <!--begin::Example-->
                    <div class="example mb-10">

                        <div class="example-preview">
                            <h5><strong>Name : </strong>{{$users->name}}</h5>
                            <h5><strong>Email : </strong>{{$users->email}}</h5>
                            <h5><strong>Phone No : </strong>{{$users->phone}}</h5>
                            <h5><strong>Type : </strong>{{$users->type}}</h5>
                            <h5><strong>Vaccine Site : </strong>{{$users->vaccineSite->name}}</h5>
                            <!-- <h5><strong>Vaccine Site : </strong>@foreach($users->vaccineSite as $vaccineSites) {{$vaccineSites->name}} @endforeach</h5> -->
                            
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
