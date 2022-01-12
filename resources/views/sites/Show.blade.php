@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('Site Details') }}</h4>
                </div>
                <div class="card-body">
                
                    <h5><strong>Name : </strong>{{$site->name}}</h5>
                    <h5><strong>Type : </strong>{{$site->type}}</h5>
                    <h5><strong>Region : </strong>{{$site->region ? $site->region->name : "--"}}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
