@extends('layouts.master')

@section('content')


<section class="bootstrap-select">
        
<div class="col-md-12 ">
    <div class="card" >

    
        <div class="card-header">
            <h4 class="card-title">Mass Testing Mega Sites - Waiting Time & Checklist</h4>
        </div>

               
        <div class="row">
            <div class="col-md-12 ">
                <div class="card-body">
                    <div class="form-group">
                        <label for="basicSelect">Site</label>
                            <form action="{{route('check')}}" method="POST">
                                @csrf
                                <select class="form-control" id="basicSelect" name="site">
                                    @foreach($sites as $site)
                                        <option value="{{$site->_id}}">{{$site->name}}</option>
                                    @endforeach
                                </select>
                                    <button type="button" class="btn btn-primary">Submit</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-12 ">
            
        
        <div class="row">

            <div class="col-md-6  ">
                    <div class="container px-4 mx-auto border border-secondary rounded">
                        <div class="p-6 m-20 bg-white rounded shadow">
                            {!! $chart->container() !!}
                        </div>
                    </div>
            </div>  
          
            <div class="col-md-6 ">
                <div class="container px-4 mx-auto border border-secondary rounded">
                        <div class="p-6 m-20 bg-white rounded shadow ">
                            {!! $chart1->container() !!}
                        </div>
                </div>    
            </div>
           
        </div>
        @foreach ($wts as $wt)

        <div class="row">


            <div class="col-md-2 ">    
                    <div class=" d-flex flex-column flex-wrap text-center border border-secondary rounded ">    
                        <h1 class="font-large-1 font-weight-bolder mt-2 mb-0">{{$wt->codeRedStatus}}</h1>             
                            <p class="card-text">Code Red status</p>
                    </div>      
            </div>

            <div class="col-md-2  ">    
                    <div class=" d-flex flex-column flex-wrap text-center border border-secondary rounded">
                        <h1 class="font-large-1 font-weight-bolder mt-2 mb-0">{{$wt->operatorSupervisorOnSite}}</h1>
                            <p class="card-text">Operator supervisor on site</p>
                    </div>      
            </div>

            <div class="col-md-2 ">    
                    <div class=" d-flex flex-column flex-wrap text-center  border border-secondary rounded">
                        <h1 class="font-large-1 font-weight-bolder mt-2 mb-0">{{$wt->doubleClinicalResourcesPerCabin}}</h1>
                            <p class="card-text">2x clinical resources per cabin</p>
                    </div>      
            </div>

             
            <div class="col-md-2  ">    
                    <div class=" d-flex flex-column flex-wrap text-center border border-secondary rounded">
                        <h1 class="font-large-1 font-weight-bolder mt-2 mb-0">{{$wt->homeKitsAvailableOnSite}}</h1>
                            <p class="card-text">Home kits available on site</p>
                    </div>      
            </div>

            <div class="col-md-2  ">    
                    <div class=" d-flex flex-column flex-wrap text-center border border-secondary rounded">
                        <h1 class="font-large-1 font-weight-bolder mt-2 mb-0">{{$wt->homeKitsInUseInTheLastHour}}</h1>
                            <p class="card-text">Home kits user in last hour</p>
                    </div>      
            </div>

            <div class="col-md-2 ">    
                    <div class=" d-flex flex-column flex-wrap text-center  border border-secondary rounded">
                        <h1 class="font-large-1 font-weight-bolder mt-2 mb-0">{{$wt->numberOfLanesClosed}}</h1>
                            <p class="card-text">Number of lanes closed</p>
                    </div>      
            </div>


        </div>




        <div class="row">


<div class="col-md-2 ">    
        <div class=" d-flex flex-column flex-wrap text-center  border border-secondary rounded">
            <h1 class="font-large-1 font-weight-bolder mt-2 mb-0">{{$wt->codeRedStatusAndShurtaAlMurourPresent}}</h1>
                <p class="card-text">Trafic Police Present</p>
        </div>      
</div>

<div class="col-md-2 ">    
        <div class=" d-flex flex-column flex-wrap text-center  border border-secondary rounded">
            <h1 class="font-large-1 font-weight-bolder mt-2 mb-0">{{$wt->PCRSampleCollectionFrequencyAsScheduled}}</h1>
                <p class="card-text">PCR sample collection Freq </p>
        </div>      
</div>

<div class="col-md-2 ">    
        <div class=" d-flex flex-column flex-wrap text-center border border-secondary rounded ">
            <h1 class="font-large-1 font-weight-bolder mt-2 mb-0">{{$wt->ARTSampleToTakenKitchenContinuously}}</h1>
                <p class="card-text">ART sample to kitchen </p>
        </div>      
</div>

 
<div class="col-md-2">    
        <div class=" d-flex flex-column flex-wrap text-center  border border-secondary rounded ">
            <h1 class="font-large-1 font-weight-bolder mt-2 mb-0">{{$wt->onSiteStocksForPCR_ARTSufficientForDay}}</h1>
                <p class="card-text">On site PCR/ART stock</p>
        </div>      
</div>

<div class="col-md-2  ">    
        <div class=" d-flex flex-column flex-wrap text-center border border-secondary rounded">
            <h1 class="font-large-1 font-weight-bolder mt-2 mb-0">{{$wt->HippaFilterOnSiteInARTKitchen}}</h1>
                <p class="card-text">Hippa Filter on site</p>
        </div>      
</div>

<div class="col-md-2  ">    
        <div class=" d-flex flex-column flex-wrap text-center border border-secondary rounded">
            <h1 class="font-large-1 font-weight-bolder mt-2 mb-0">{{$wt->dataIsBeingEnteredAsPerTraining}}</h1>
                <p class="card-text">Data entered as per training</p>
        </div>      
</div>


</div>




        <div class="row">
        
            <div class="col-md-3 ">    
                    <div class=" d-flex flex-column flex-wrap text-center  border border-secondary rounded">
                        <h1 class="font-large-1 font-weight-bolder mt-2 mb-0">{{$wt->shiftToShiftHandoverAsPerOperatorSLA}}</h1>
                            <p class="card-text">Shift handover as per SLA</p>
                    </div>      
            </div>

            <div class="col-md-3">    
                    <div class=" d-flex flex-column flex-wrap text-center  border border-secondary rounded ">
                        <h1 class="font-large-1 font-weight-bolder mt-2 mb-0">{{$wt->details}}</h1>
                            <p class="card-text">Mode of Operations</p>
                    </div>      
            </div>

            <div class="col-md-6  ">    
                    <div class=" d-flex flex-column flex-wrap text-center border border-secondary rounded">
                        <h1 class="font-large-1 font-weight-bolder mt-2 mb-0">{{$wt->modeOfOperations}}</h1>
                            <p class="card-text">Top 3 issues by site</p>
                    </div>      
            </div>
        
        
        </div>

        @endforeach



    </div>

    </div>
</div>
</section>               
                
<script src="{{ $chart->cdn() }}"></script>

{{ $chart->script() }}
{{ $chart1->script() }}
                             
                




@endsection

