@extends('layouts.master')

@section('content')

<div class="col-md-12  ">
    <div class="container-fluid" style="background:#f5f6f7;" >
        <div class=" d-flex justify-content-between pb-2">
            <h4 class="font-large-1 font-weight-bolder mt-2 mb-0">Mass Testing Mega Sites - Inventory </h4>
        </div>

        <div class="row">
            @foreach ($sites as $site )
                
            <div class="col-md-12 col-lg-6   mt-5">
                <div class="card inventory-card inventory-card-shadow w-100 h-100  pb-0">
                    <div class="card-header card-header-dashboard d-flex justify-content-between pb-0 ">
                        <div class="tag"></div>
                        <h4 class="card-title font-large-1 font-weight-bolder title ">{{$site->name}} </h4>
                        
                    </div>

                    
                    <div class="card-body p-0" >
                        <div class="row" >
                            @foreach($site->inventories as $inventory)
                                <div class="col-md-12 col-lg-4    flex-column">
                                    @if($inventory->item->name == "syringe")
                                    <div class="income3">  <img src="/app-assets/images/icons/syringe.svg" /> 
                                    @elseif ($inventory->item->name == "cylinder")
                                    <div class="income">  <img src="/app-assets/images/icons/placeholder.svg" />
                                    @else
                                    <div class="income4">  <img src="/app-assets/images/icons/plastic.svg" />  
                                    @endif    
                                        <h1 class="item-name mt-3  ">{{$inventory->item->name }} </h1>
                                            <p class="item-number">{{$inventory->stock? $inventory->stock :"--"}}</p>
                                        </div>
                                        <p class="font-small-3  mt-0 mb-0">{{$inventory->updated_at}}</p>


                                </div>
                            @endforeach
                           
                                    
                              
                        </div>
                    </div>
    
                       
                    
                </div>
            </div>   
                @endforeach     

            </div>
        </div>

    </div>



@endsection

