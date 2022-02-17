@extends('layouts.master')

@section('content')
    <div class="container-fluid" style="background:#f5f6f7;">
        @foreach ($wts as $wt)
            <div class="row" style="margin: 0%">
                <div class=" col-md-8">
                    <div class="row">
                        <div class="col-md-6  ">
                            <div class="container px-0 mx-auto">
                                <div class="p-6 m-20 bg-white rounded shadow">
                                    <div class="tag5 ml-1"></div>
                                    {!! $chart2->container() !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 ">
                            <div class="container px-0 mx-auto">
                                <div class="p-6 m-20 bg-white rounded shadow">
                                    <div class="tag6 ml-1"></div>
                                    {!! $chart3->container() !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12  ">
                            <div class="container px-0 mx-auto mt-1 ">
                                <div class="tag2"></div>
                                <div class="p-9 m-20 bg-white rounded shadow ">
                                    {!! $chart->container() !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 ">
                            <div class="container px-0 mx-auto">
                                <div class="tag3"></div>
                                <div class="p-6 m-20 bg-white rounded shadow mt-1  ">
                                    {!! $chart1->container() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="  col-md-4 py-1 mb-0 mt-0 h-100">
                    <div class="col-md-12 mb-4 ">
                        <div class=" d-flex flex-column flex-wrap text-center  income2  ">
                            <form action="{{ route('check') }}" method="GET">
                                <label for="fp-default">Filter</label>
                                <input type="text" id="fp-default" class="form-control flatpickr-basic"
                                    placeholder="YYYY-MM-DD" name="date" />
                            </form>
                        </div>
                    </div>
                    <div class="row card">

                        <div class="col-md-12 mb-2 mt-1">
                            <div class="tag4 ml-1"></div>
                            <h1 class=" overview--heading ml-2"> Overview</h1>
                        </div>

                        <div class=" col-md-12 mb-1 mt-1  ">
                            <div
                                class="d-flex overviewCard {{ $wt->codeRedStatus == 'Yes' ? 'yes-condition' : 'no-condition' }}">
                                <div class="icon2 overviewCard--icon"> <i class="kit2"
                                        data-feather='alert-triangle'></i>
                                </div>
                                <p class="font-weight-bold overviewCard--content">Code Red status</p>
                                <h1 class="font-medium-2 font-weight-bolder overviewCard--status ">
                                    {{ $wt->codeRedStatus }}</h1>
                            </div>
                        </div>
                        <div class="col-md-12 mb-1 ">
                            <div
                                class=" d-flex overviewCard  {{ $wt->shiftToShiftHandoverAsPerOperatorSLA == 'Yes' ? 'yes-condition' : 'no-condition' }} ">
                                <div class="icon2 overviewCard--icon "> <i class="kit2"
                                        data-feather="arrow-up"></i> </div>
                                <p class=" font-weight-bold   overviewCard--content">Shift handover per SLA</p>
                                <h1 class="font-medium-2 font-weight-bolder overviewCard--status">
                                    {{ $wt->shiftToShiftHandoverAsPerOperatorSLA }}</h1>
                            </div>
                        </div>
                        <div class="col-md-12 mb-1 ">
                            <div
                                class=" d-flex overviewCard  {{ $wt->doubleClinicalResourcesPerCabin == 'Yes' ? 'yes-condition' : 'no-condition' }} ">
                                <div class="icon2 overviewCard--icon  "> <i class="kit2"
                                        data-feather="user-plus"></i> </div>
                                <p class=" font-weight-bold    overviewCard--content">2x clinical resources cabin</p>
                                <h1 class="font-medium-2 font-weight-bolder  overviewCard--status">
                                    {{ $wt->doubleClinicalResourcesPerCabin }}</h1>
                            </div>
                        </div>
                        <div class="col-md-12  mb-1  ">
                            <div
                                class=" d-flex overviewCard   {{ $wt->homeKitsAvailableOnSite == 'Yes' ? 'yes-condition' : 'no-condition' }} ">
                                <div class="icon2 overviewCard--icon "> <i class="kit2"
                                        data-feather="plus-square"></i>
                                </div>
                                <p class=" font-weight-bold   overviewCard--content">Details</p>
                                <h1 class="font-medium-2 font-weight-bolder  overviewCard--status">{{ $wt->details }}</h1>
                            </div>
                        </div>
                        <div class="col-md-12 mb-1   ">
                            <div
                                class="d-flex  overviewCard    {{ $wt->homeKitsInUseInTheLastHour == 'Yes' ? 'yes-condition' : 'no-condition' }} ">
                                <div class="icon2 overviewCard--icon    "> <i class="kit2"
                                        data-feather="plus-square"></i>
                                </div>
                                <p class=" font-weight-bold  overviewCard--content">Homekit used last hour</p>
                                <h1 class="font-medium-2 font-weight-bolder  overviewCard--status">
                                    {{ $wt->homeKitsInUseInTheLastHour }}
                                </h1>
                            </div>
                        </div>
                        <div class="col-md-12 mb-1  ">
                            <div
                                class=" d-flex overviewCard  {{ $wt->numberOfLanesClosed == 'Yes' ? 'yes-condition' : 'no-condition' }} ">
                                <div class="icon2 overviewCard--icon  "> <i class="kit2" data-feather="slash"></i>
                                </div>
                                <p class=" font-weight-bold   overviewCard--content">Number of lanes closed</p>
                                <h1 class="font-medium-2 font-weight-bolder   overviewCard--status">
                                    {{ $wt->numberOfLanesClosed }}</h1>
                            </div>
                        </div>
                        <div class="col-md-12 mb-1 ">
                            <div
                                class=" d-flex overviewCard  {{ $wt->codeRedStatusAndShurtaAlMurourPresent == 'Yes' ? 'yes-condition' : 'no-condition' }}">
                                <div class="icon2  overviewCard--icon  "> <i class="kit2"
                                        data-feather="alert-triangle"></i>
                                </div>
                                <p class=" font-weight-bold  overviewCard--content">Trafic Police Present</p>
                                <h1 class="font-medium-2 font-weight-bolder   overviewCard--status">
                                    {{ $wt->codeRedStatusAndShurtaAlMurourPresent }}</h1>
                            </div>
                        </div>
                        <div class="col-md-12 mb-1 ">
                            <div
                                class="d-flex overviewCard {{ $wt->PCRSampleCollectionFrequencyAsScheduled == 'Yes' ? 'yes-condition' : 'no-condition' }}">
                                <div class="icon2 overviewCard--icon  "> <i class="kit2"
                                        data-feather="thermometer"></i>
                                </div>
                                <p class=" font-weight-bold  overviewCard--content">PCR sample collection</p>
                                <h1 class="font-medium-2 font-weight-bolder   overviewCard--status">
                                    {{ $wt->PCRSampleCollectionFrequencyAsScheduled }}</h1>
                            </div>
                        </div>
                        <div class="col-md-12 mb-1  ">
                            <div
                                class=" d-flex overviewCard {{ $wt->ARTSampleToTakenKitchenContinuously == 'Yes' ? 'yes-condition' : 'no-condition' }}">
                                <div class="icon2  overviewCard--icon  "> <i class="kit2"
                                        data-feather="droplet"></i> </div>
                                <p class=" font-weight-bold  overviewCard--content">ART sample to kitchen </p>
                                <h1 class="font-medium-2 font-weight-bolder overviewCard--status">
                                    {{ $wt->ARTSampleToTakenKitchenContinuously }}</h1>
                            </div>
                        </div>
                        <div class="col-md-12 mb-1 ">
                            <div
                                class="d-flex overviewCard  {{ $wt->onSiteStocksForPCR_ARTSufficientForDay == 'Yes' ? 'yes-condition' : 'no-condition' }}">
                                <div class="icon2 overviewCard--icon  "> <i class="kit2"
                                        data-feather="archive"></i> </div>
                                <p class=" font-weight-bold  overviewCard--content">On site PCR/ART stock</p>
                                <h1 class="font-medium-2 font-weight-bolder  overviewCard--status">
                                    {{ $wt->onSiteStocksForPCR_ARTSufficientForDay }}</h1>
                            </div>
                        </div>
                        <div class="col-md-12 mb-1  ">
                            <div
                                class="d-flex  overviewCard {{ $wt->HippaFilterOnSiteInARTKitchen == 'Yes' ? 'yes-condition' : 'no-condition' }}">
                                <div class="icon2 overviewCard--icon   "> <i class="kit2"
                                        data-feather="archive"></i> </div>
                                <p class=" font-weight-bold  overviewCard--content">Hippa Filter on site</p>
                                <h1 class="font-medium-2 font-weight-bolder  overviewCard--status">
                                    {{ $wt->HippaFilterOnSiteInARTKitchen }}
                                </h1>
                            </div>
                        </div>
                        <div class="col-md-12 mb-1  ">
                            <div
                                class=" d-flex overviewCard {{ $wt->dataIsBeingEnteredAsPerTraining == 'Yes' ? 'yes-condition' : 'no-condition' }}">
                                <div class="icon2 overviewCard--icon  "> <i class="kit2"
                                        data-feather="check-square"></i>
                                </div>
                                <p class=" font-weight-bold  overviewCard--content">Data entered per training</p>
                                <h1 class="font-medium-2 font-weight-bolder   overviewCard--status">
                                    {{ $wt->dataIsBeingEnteredAsPerTraining }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>



    <script src="{{ $chart->cdn() }}"></script>

    {{ $chart->script() }}
    {{ $chart1->script() }}
    {{ $chart2->script() }}
    {{ $chart3->script() }}


    @push('script')
        <script>
            let searchParams = new URLSearchParams(window.location.search);
            let param = searchParams.get('date');
            let date = param ? param : new Date();
            $(".flatpickr-basic").flatpickr({
                defaultDate: date
            });
            $("#fp-default").change(function() {
                $('form').submit()
            })
        </script>
    @endpush
@endsection
