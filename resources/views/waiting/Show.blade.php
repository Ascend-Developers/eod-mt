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
                    <h4 class="card-title">{{ __('Waiting Time Details') }}</h4>
                </div>
                <div class="card-body">
                    <!--begin::Example-->
                    <div class="example mb-10">
                        <div class="example-preview">
                            <h5><strong>Site Name : </strong>{{$wt->site ? $wt->site->name : "--"}}</h5>
                            <h5><strong>T1 <span style="font-size: 70%"> (Arrival to cabin)</span>: </strong>{{$wt->t1}}</h5>
                            <h5><strong>T2 <span style="font-size: 70%"> (At cabin)</span>: </strong>{{$wt->t2}}</h5>
                            <h5><strong>T3 <span style="font-size: 70%"> (Total TAT)</span>: </strong>{{$wt->t3}}</h5>
                            <h5><strong>Status : </strong>
                                @if($wt->t3 < 20)
                                    <span class="badge badge-success" >Green</span>
                                @else
                                    <span class="badge badge-danger" >Red</span>
                                @endif
                            </h5>
                            <h5><strong>Submitted By : </strong>{{$wt->user ? $wt->user->name: "--"}}</h5>
                            <h5><strong>Date of Report : </strong>{{$wt->created_at->format('F j, Y, g:i a')}}</h5>
                            <h5><strong>Code Red status : </strong>{{$wt->codeRedStatus}}</h5>
                            <h5><strong>Operator supervisor on site : </strong>{{$wt->operatorSupervisorOnSite}}</h5>
                            <h5><strong>Double clinical resources per cabin : </strong>{{$wt->doubleClinicalResourcesPerCabin}}</h5>
                            <h5><strong>Home kits available on site : </strong>{{$wt->homeKitsAvailableOnSite}}</h5>
                            <h5><strong>Home kits in use in the last hour : </strong>{{$wt->homeKitsInUseInTheLastHour}}</h5>
                            <h5><strong>Number of lanes closed : </strong>{{$wt->numberOfLanesClosed}}</h5>
                            <h5><strong>Code Red status and Shurta Al Murour present : </strong>{{$wt->codeRedStatusAndShurtaAlMurourPresent}}</h5>
                            <h5><strong>PCR sample collection frequency as scheduled : </strong>{{$wt->PCRSampleCollectionFrequencyAsScheduled}}</h5>
                            <h5><strong>ART sample to taken kitchen continuously : </strong>{{$wt->ARTSampleToTakenKitchenContinuously}}</h5>
                            <h5><strong>On site stocks for PCR, ART sufficient for day : </strong>{{$wt->onSiteStocksForPCR_ARTSufficientForDay}}</h5>
                            <h5><strong>Hippa Filter on site in ART kitchen : </strong>{{$wt->HippaFilterOnSiteInARTKitchen}}</h5>
                            <h5><strong>Data is being entered as per training : </strong>{{$wt->dataIsBeingEnteredAsPerTraining}}</h5>
                            <h5><strong>Shift to shift handover as per operator SLA : </strong>{{$wt->shiftToShiftHandoverAsPerOperatorSLA}}</h5>
                            <h5><strong>Top 3 issues by site <span style="font-size: 70%"> (Staggered with 50% of cabins swapping at any time and no more than 15 mins handover)</span> : </strong>{{$wt->details}}</h5>
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
