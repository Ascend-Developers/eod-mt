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
@push('script')
<script>
    $('.select2').select2({
        placeholder: 'Select an option'
    });

    $("#wt-codeRed").hide()
    $("#wt-operatorSite").hide()
    $("#wt-doubleClinic").hide()
    $("#wt-homeKit").hide()
    $("#wt-homeKit-lastHour").hide()
    $("#wt-laneClosed").hide()
    $("#wt-codeRed-present").hide()
    $("#wt-pcr").hide()
    $("#wt-art").hide()
    $("#wt-stocksPCR").hide()
    $("#wt-hippaART").hide()
    $("#wt-traning").hide()
    $("#wt-SLA").hide()
    $("#wt-operation").hide()
    $("#wt-details").hide()
    
    $(document).on('change','#siteType',function(e){
        // $val = $("#siteType").attr('data-user')
        $val = $('option:selected', this).attr('data-user')
        // console.log($val);
        if($val === "minor"){
            $("#wt-codeRed").hide()
            $("#wt-operatorSite").hide()
            $("#wt-doubleClinic").hide()
            $("#wt-homeKit").hide()
            $("#wt-homeKit-lastHour").hide()
            $("#wt-laneClosed").show()
            $("#wt-codeRed-present").hide()
            $("#wt-pcr").hide()
            $("#wt-art").hide()
            $("#wt-stocksPCR").hide()
            $("#wt-hippaART").hide()
            $("#wt-traning").hide()
            $("#wt-SLA").hide()
            $("#wt-operation").hide()
            $("#wt-details").hide()
        }
        if($val === "mega"){
            $("#wt-codeRed").show()
            $("#wt-operatorSite").show()
            $("#wt-doubleClinic").show()
            $("#wt-homeKit").show()
            $("#wt-homeKit-lastHour").show()
            $("#wt-laneClosed").show()
            $("#wt-codeRed-present").show()
            $("#wt-pcr").show()
            $("#wt-art").show()
            $("#wt-stocksPCR").show()
            $("#wt-hippaART").show()
            $("#wt-traning").show()
            $("#wt-SLA").show()
            $("#wt-operation").show()
            $("#wt-details").show()
        }
    })
</script>
@endpush
