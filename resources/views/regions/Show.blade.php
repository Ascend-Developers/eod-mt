@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Region Details') }}</div>

                <div class="card-body">
                
                    <h5><strong>Name : </strong>{{$regions->name}}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
