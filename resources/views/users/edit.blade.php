@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('Edit User') }}</h4>
                </div>
                <div class="card-body">
                    <div class="p-5">
                        <form action="{{route('user.update', $users->id)}}" method="POST">
                        @method('PATCH')
                        @csrf
                            @include('users.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    $('.select2').select2({
        placeholder: 'Select an option'
    });
</script>
@endpush
