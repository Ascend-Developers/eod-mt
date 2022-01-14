@extends('layouts.master')
@section('content')

<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Dashboard-->
        <div class="row">
             <div class="card card-custom gutter-b w-100">
                <div class="card-header">
                    <h4 class="card-title">{{ __('Rapid Antigen Site Audid') }}</h4>
                </div>
                <div class="card-body">
                    <!--begin::Example-->
                    <div class="example mb-10">
                        <div class="example-preview">
                            <h5><strong>Site Name : </strong> {{$ratsa->site ? $ratsa->site->name : "--"}} </h5>
                            <h5><strong>Cabinet Numbers : </strong> {{$ratsa->cabinNo}} </h5>
                            <h5><strong>Training sample withdrawl : </strong> {{$ratsa->trainingSampleWithdrawal}} </h5>
                            <h5><strong>Training RAT use : </strong> {{$ratsa->trainingRATUse}} </h5>
                            <h5><strong>Training in use of HESN : </strong> {{$ratsa->trainingInUseOfESN}} </h5>
                            <h5><strong>Rapid Antigen Test Batch Check : </strong> {{$ratsa->rapidAntigenTestBatchCheck}} </h5>
                            <h5><strong>Correct swab and cassette labeling : </strong> {{$ratsa->correctSwabAndCassetteLabeling}} </h5>
                            <h5><strong>Infection Control / PPE : </strong> {{$ratsa->infectionControl_PPE}} </h5>
                            <h5><strong>Waste Disposal : </strong> {{$ratsa->wasteDisposal}} </h5>
                            <h5><strong>Preparation of extraction tubes : </strong> {{$ratsa->preparationOfExtractionTubes}} </h5>
                            <h5><strong>Non reacting cassettes : </strong> {{$ratsa->nonReactingCassettes}} </h5>
                            <h5><strong>Health and Safety : </strong> {{$ratsa->healthAndSafety}} </h5>
                            <h5><strong>Submited By : </strong> {{$ratsa->user ? $ratsa->user->name: "--"}} </h5>
                            <h5><strong>Report Date : </strong> {{ $ratsa->created_at->format('F j, Y, g:i a') }} </h5>
                        </div>
                    </div>
                    <!--end::Example-->
                </div>
            </div>
        </div>
        <!--end::Dashboard-->
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->
@endsection
