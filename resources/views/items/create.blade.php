@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('Add Item') }}</h4>
                </div>

                <div class="card-body">
                    <form action="{{route('item.store')}}" method="POST">
                        @csrf
                            @include('items.form')
                            <button type="submit" class="btn btn-outline-primary">Submit</button>
                    </form>
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
