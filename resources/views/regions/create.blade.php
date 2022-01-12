@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('Add Region') }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('region.store')}}" method="POST">
                        @csrf
                            @include('regions.form')
                            <button type="submit" class="btn btn-outline-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
