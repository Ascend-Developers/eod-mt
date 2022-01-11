@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Edit Wating Time') }}</div>

                <div class="card-body">
                    <div class="p-5">
                        <form action="{{route('waiting.update', $wt->id)}}" method="POST">
                        @method('PATCH')
                        @csrf
                            @include('waiting.form')
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
