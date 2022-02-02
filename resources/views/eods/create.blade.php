@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('Add Submissions') }}</h4>
                </div>

                <div class="card-body">
                    <form action="{{route('eod.store')}}" method="POST">
                        @csrf
                            @include('eods.form')
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
    var sites = {!! json_encode($sites->toArray()) !!};
    console.log(sites);
    $('.select2').select2({
        placeholder: 'Select an option'
    });
    $(document).on('change', '#site_id', function() {
        $("#item_id").val('').trigger('change')
    });

    $(document).on('change', '#item_id', function() {
        // $("#item_id").empty().trigger('change')
        // console.log($("#item_id").val(), $("#site_id").val());
        let filterSites = sites.filter(site => site._id === $("#site_id").val());
        let inventory = filterSites[0]?.inventories.filter(intventory => intventory.item_id === $("#item_id").val());

        if(inventory && inventory.length > 0){
            console.log(inventory[0].stock);
            $("#startOfStock").val(inventory[0].stock)
        }else{
            $("#startOfStock").val(0)
        }
    });
    </script>

@endpush
