@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('Add MT hourly checklist status') }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('waiting.store')}}" method="POST">
                        @csrf
                            @include('waiting.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

