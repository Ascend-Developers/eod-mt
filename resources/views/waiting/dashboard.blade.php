@extends('layouts.master')

@section('content')



        
<div class="col-12 ">
    <div class="container-fluid" style="background:#f5f6f7;" >

        @foreach ($wts as $wt)
               
        <div class="row" style="margin: 0%">
            
            <div class="col-md-3  ">    
                <div class="container px-0 mx-auto">

                    <div class="p-6 m-20 bg-white rounded shadow">
                        {!! $chart2->container() !!}
                    </div>
                
                </div>    
            </div>
           
    
            <div class="col-md-3">    
                <div class=" d-flex flex-column flex-wrap text-center  shadow-box  {{$wt->codeRedStatus == "Yes" ? 'yes-condition' : 'no-condition'}}">
                    <h1 class="font-large-1 font-weight-bolder mt-2 mb-0">{{$wt->details}}</h1>
                        <p class="card-text font-weight-bold mt-2 mb-0"">Details</p>
                </div>      
        </div>

        <div class="col-md-3  ">    
            <div class=" d-flex flex-column flex-wrap text-center  income2  ">
                <h1 class="font-large-1 font-weight-bolder mt-2 mb-2">{{$wt->modeOfOperations}}</h1>
                    <p class="card-text font-weight-bold">Mode Of Operations</p>
            </div>      
        </div>
            <div class="col-md-3 ">
                    <div class="form-group">
                        <label for="basicSelect " class="font-medium-1 font-weight-bolder">Site</label>
                            <form action="{{route('check')}}" method="POST">
                                @csrf
                                <select class="form-control font-medium-1" id="basicSelect" name="site">
                                    @foreach($sites as $site)
                                        <option value="{{$site->_id}}">{{$site->name}}</option>
                                    @endforeach
                                </select>
                                    <button type="button" class="btn btn-primary">Submit</button>
                            </form>
                    </div>
                </div>
            </div>
        


        <div class="col-12 ">
            
        
        <div class="row">

            <div class="col-md-6  ">
                    <div class="container px-0 mx-auto ">
                <div class="tag2"></div>

                        <div class="p-9 m-20 bg-white rounded shadow">
                            {!! $chart->container() !!}
                        </div>
                    </div>
            </div>  
          
        <div class="col-md-6 ">
            <div class="row">

                <div class="col-md-4 ">    
                    <div class=" d-flex flex-column flex-wrap  shadow-box    {{$wt->codeRedStatus == "Yes" ? 'yes-condition' : 'no-condition'}}">    
                        <div class="icon2  "> <i class="kit2" data-feather='alert-triangle'></i>  </div>
                        <p class="card-text font-weight-bold mt-5 text">Code Red status</p>
                        <h1 class="font-large-1 font-weight-bolder mt-0 mb-2 text" >{{$wt->codeRedStatus}}</h1>             
                    </div>      
            </div>
            
            <div class="col-md-4 ">    
                <div class=" d-flex flex-column flex-wrap  shadow-box   {{$wt->shiftToShiftHandoverAsPerOperatorSLA == "Yes" ? 'yes-condition' : 'no-condition'}} ">
                    <div class="icon2  "> <i class= "kit2" data-feather="arrow-up"></i>  </div>
                    <p class="card-text font-weight-bold  mt-5 text">Shift handover as per SLA</p>

                    <h1 class="font-large-1 font-weight-bolder mt-0 mb-2 text ">{{$wt->shiftToShiftHandoverAsPerOperatorSLA}}</h1>
                </div>      
        </div>

    
            <div class="col-md-4 ">    
                    <div class=" d-flex flex-column flex-wrap text-center  shadow-box {{$wt->doubleClinicalResourcesPerCabin == "Yes" ? 'yes-condition' : 'no-condition'}} ">
                        <div class="icon2   "> <i class= "kit2" data-feather="user-plus"></i>  </div>
                        <p class="card-text font-weight-bold   mt-5 text">2x clinical resources cabin</p>

                        <h1 class="font-large-1 font-weight-bolder mt-0 mb-2 text">{{$wt->doubleClinicalResourcesPerCabin}}</h1>
                    </div>      
            </div>
            
             
            <div class="col-md-4  mt-2 ">    
                    <div class=" d-flex flex-column flex-wrap text-center shadow-box  {{$wt->homeKitsAvailableOnSite == "Yes" ? 'yes-condition' : 'no-condition'}} ">
                        <div class="icon2 "> <i class= "kit2" data-feather="plus-square"></i>  </div>
                        <p class="card-text font-weight-bold  mt-5 text">Home kits available on site</p>

                        <h1 class="font-large-1 font-weight-bolder mt-0 mb-2 text">{{$wt->homeKitsAvailableOnSite}}</h1>
                    </div>      
            </div>
    
            <div class="col-md-4 mt-2   ">    
                    <div class=" d-flex flex-column flex-wrap text-center shadow-box {{$wt->homeKitsInUseInTheLastHour == "Yes" ? 'yes-condition' : 'no-condition'}} ">
                        <div class="icon2   "> <i class= "kit2" data-feather="plus-square"></i>  </div>
                        <p class="card-text font-weight-bold mt-5 text">Home kits user in last hour</p>

                        <h1 class="font-large-1 font-weight-bolder mt-0 mb-2 text">{{$wt->homeKitsInUseInTheLastHour}}</h1>
                    </div>      
            </div>
    
            <div class="col-md-4 mt-2 ">    
                    <div class=" d-flex flex-column flex-wrap text-center shadow-box {{$wt->numberOfLanesClosed == "Yes" ? 'yes-condition' : 'no-condition'}} ">
                        <div class="icon2   "> <i class= "kit2" data-feather="slash"></i>  </div>
                        <p class="card-text font-weight-bold mt-5 text">Number of lanes closed</p>

                        <h1 class="font-large-1 font-weight-bolder mt-0 mb-2 text">{{$wt->numberOfLanesClosed}}</h1>
                    </div>      
            </div>
    

            </div>
            
        
        
        </div>    
           
           
        </div>

        <div class="row">

            <div class="col-md-6 ">

                <div class="container px-0 mx-auto">
                <div class="tag3"></div>

                        <div class="p-6 m-20 bg-white rounded shadow mt-1  ">
                            
                            {!! $chart1->container() !!}
                        </div>
                </div>    
            </div>
            

   
            <div class="col-md-6 ">
                <div class="row">

<div class="col-md-4  mt-1">    
        <div class=" d-flex flex-column flex-wrap text-center shadow-box {{$wt->codeRedStatusAndShurtaAlMurourPresent == "Yes" ? 'yes-condition' : 'no-condition'}}">
            <div class="icon2   "> <i class= "kit2" data-feather="alert-triangle"></i>  </div>
            <p class="card-text font-weight-bold mt-5 text">Trafic Police Present</p>

            <h1 class="font-large-1 font-weight-bolder mt-0 mb-2 text">{{$wt->codeRedStatusAndShurtaAlMurourPresent}}</h1>
        </div>      
</div>

<div class="col-md-4 mt-1 ">    
        <div class=" d-flex flex-column flex-wrap text-center shadow-box {{$wt->PCRSampleCollectionFrequencyAsScheduled == "Yes" ? 'yes-condition' : 'no-condition'}}">
            <div class="icon2   "> <i class= "kit2" data-feather="thermometer"></i>  </div>
            <p class="card-text font-weight-bold mt-5 text">PCR sample collection</p>

            <h1 class="font-large-1 font-weight-bolder mt-0 mb-2 text">{{$wt->PCRSampleCollectionFrequencyAsScheduled}}</h1>
        </div>      
</div>

<div class="col-md-4 mt-1  ">    
        <div class=" d-flex flex-column flex-wrap text-center shadow-box {{$wt->ARTSampleToTakenKitchenContinuously == "Yes" ? 'yes-condition' : 'no-condition'}}">
            <div class="icon2   "> <i class= "kit2" data-feather="droplet"></i>  </div>
            <p class="card-text font-weight-bold mt-5 text">ART sample to kitchen </p>

            <h1 class="font-large-1 font-weight-bolder mt-0 mb-2 text">{{$wt->ARTSampleToTakenKitchenContinuously}}</h1>
        </div>      
</div>

 
<div class="col-md-4 mt-2 ">    
        <div class=" d-flex flex-column flex-wrap text-center shadow-box  {{$wt->onSiteStocksForPCR_ARTSufficientForDay == "Yes" ? 'yes-condition' : 'no-condition'}}">
            <div class="icon2  "> <i class= "kit2" data-feather="archive"></i>  </div>
            <p class="card-text font-weight-bold mt-5 text">On site PCR/ART stock</p>

            <h1 class="font-large-1 font-weight-bolder mt-0 mb-2 text">{{$wt->onSiteStocksForPCR_ARTSufficientForDay}}</h1>
        </div>      
</div>

<div class="col-md-4 mt-2  ">    
        <div class=" d-flex flex-column flex-wrap text-center shadow-box {{$wt->HippaFilterOnSiteInARTKitchen == "Yes" ? 'yes-condition' : 'no-condition'}}">
            <div class="icon2   "> <i class= "kit2" data-feather="archive"></i>  </div>
            <p class="card-text font-weight-bold mt-5 text">Hippa Filter on site</p>

            <h1 class="font-large-1 font-weight-bolder mt-0 mb-2 text">{{$wt->HippaFilterOnSiteInARTKitchen}}</h1>
        </div>      
</div>

<div class="col-md-4 mt-2  ">    
        <div class=" d-flex flex-column flex-wrap text-center shadow-box {{$wt->dataIsBeingEnteredAsPerTraining == "Yes" ? 'yes-condition' : 'no-condition'}}">
            <div class="icon2  "> <i class= "kit2" data-feather="check-square"></i>  </div>
            <p class="card-text font-weight-bold mt-5 text">Data entered per training</p>

            <h1 class="font-large-1 font-weight-bolder mt-0 mb-2 text">{{$wt->dataIsBeingEnteredAsPerTraining}}</h1>
        </div>      
</div>

                </div>
            </div>

</div>



 @endforeach




    </div>
</div>
</div>
            
                
<script src="{{ $chart->cdn() }}"></script>

{{ $chart->script() }}
{{ $chart1->script() }}
{{ $chart2->script() }}

                             
                




@endsection

