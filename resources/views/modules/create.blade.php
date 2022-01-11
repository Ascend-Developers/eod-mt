@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Add Module') }}</div>

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
