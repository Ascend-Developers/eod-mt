@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dispatch Vaccines') }}</div>

                <div class="card-body">
                    <form action="{{route('transection.store')}}" method="POST">
                        @csrf
                            @include('transactions.form')
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
