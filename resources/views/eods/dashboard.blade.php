@extends('layouts.master')

@section('content')
<div class="col-sm-12 ">
            
                <div class=" d-flex justify-content-between pb-2">
                    <h4 class="font-large-1 font-weight-bolder mt-2 mb-0">Mass Testing Mega Sites - Inventory </h4>                           
              
</div>
<div class="row match-height">
    @foreach($sites as $site)
        <div class="col-sm-4 ">
            <div class="card">
                <div class="card-header d-flex justify-content-between pb-2">
                    <h4 class="card-title">{{$site->name}} </h4>                           
                </div>

                <div class="card-body">
                    <div class="row">
                        @foreach($site->inventories as $inventory)
                            <div class="col-sm-4 d-flex flex-column flex-wrap text-center">
                                <h1 class="font-large-1 font-weight-bolder mt-2 mb-0">{{$inventory->stock? $inventory->stock :"--"}}</h1> 
                                    @if($inventory->item)
                                    <p class="card-text">{{$inventory->item->name}}</p> 
                                    @endif
                            </div>
                        @endforeach
                    </div>           
                </div>
    
                <div class="card-body">
                    <div class="row border-top text-center mx-0">
                            @foreach($site->inventories as $inventory)
                                <div class="col-sm-4 d-flex flex-column flex-wrap text-center ">
                                    <h1 class="font-medium-1 font-weight-bolder mt-2 mb-0">{{$inventory->updated_at}}</h1>
                                        <p class="card-text">Last Entry Time</p>
                                </div>
                            @endforeach                                     
                    </div>           
                </div>
            </div>
        </div>                              
    @endforeach                  
        </div>                   
</div>  
        
@endsection

  