@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('Add Module') }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('module.store')}}" method="POST">
                        @csrf
                            @include('modules.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
