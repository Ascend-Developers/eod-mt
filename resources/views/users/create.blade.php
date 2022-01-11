@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Add User') }}</div>

                <div class="card-body">
                    <form action="{{route('user.store')}}" method="POST">
                        @csrf
                            @include('users.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
