@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Module Details') }}</div>

                <div class="card-body">

                    <h5><strong>Name : </strong>{{$module->name}}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
