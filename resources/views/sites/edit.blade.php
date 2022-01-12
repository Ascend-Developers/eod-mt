@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('Edit Site') }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('site.update', $site->id)}}" method="POST">
                        @method('PATCH')
                        @csrf
                            @include('sites.form')
                            <button type="submit" class="btn btn-outline-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
