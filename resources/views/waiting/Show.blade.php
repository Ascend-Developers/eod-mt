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
                            <h3>Wating Time :</h3>
                            <div style="margin-left: 5%">
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
                            </div>
                            <h3>Operation Excellence :</h3>
                            <div style="margin-left: 5%">
                                <h5><strong>Number Of Resources Per cabin : </strong>{{$wt->numberOfResourcesPerCabinet}}</h5>
                                <h5><strong>Total Number Of cabin : </strong>{{$wt->totalNumberOfCabinets}}</h5>
                                <h5><strong>How Many Open : </strong>{{$wt->howManyOpen}}</h5>
                                <h5><strong>How Many Closed : </strong>{{$wt->howManyClosed}}</h5>
                                <h5><strong>Shift To Shift Compliance : </strong>{{$wt->shiftToShiftCompliance}}</h5>
                                <h5><strong>Shift Supervisor On Duty : </strong>{{$wt->shiftSupervisorOnDuty}}</h5>
                            </div>
                            <h3>Code Red Protocol :</h3>
                            <div style="margin-left: 5%">
                                <h5><strong>Strong Triage : </strong>{{$wt->strongTriage}}</h5>
                                <h5><strong>Home Kit Distribution : </strong>{{$wt->homeKitDistribution}}</h5>
                            </div>
                            <h3>RT Kitchen :</h3>
                            <div style="margin-left: 5%">
                                <h5><strong>Medical HIPPA Filter : </strong>{{$wt->medicalHippaFilter}}</h5>
                                <h5><strong>Rapid Test Data Entry : </strong>{{$wt->rapidTestDataEntry}}</h5>
                            </div>
                            <h3>Others :</h3>
                            <div style="margin-left: 5%">
                                <h5><strong>Supplies For 6 Day : </strong>{{$wt->suppliesFor6Day}}</h5>
                                <h5><strong>PCR Sample Collection Frequency : </strong>{{$wt->PCRSampleCollectionFrequency}}</h5>
                            </div>
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
