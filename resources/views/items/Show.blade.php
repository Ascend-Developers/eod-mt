@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('Item Details') }}</h4>
                </div>
                <div class="card-body">
                    <h5><strong>Name : </strong>{{$item->name}}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
