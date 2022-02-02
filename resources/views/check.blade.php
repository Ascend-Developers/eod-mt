@extends('layouts.master')

@section('content')

<section class="bootstrap-select">
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Bootstrap Select</h4>
                                </div>
                                <div class="card-body">
                                    <!-- Basic Select -->
                                    <div class="form-group">
                                        <label for="basicSelect">Site</label>
                                        <form action="{{route('check')}}">
                                        <select class="form-control" id="basicSelect" name="site">
                                          @foreach($sites as $site)
                                            <option value="{{$site->_id}}">{{$site->name}}</option>
                                            
                                            @endforeach
                                        </select>
                                        <button type="button" class="btn btn-primary">Submit</button>
                                        </form>
                                       
                                        
                                       
                                        
                                        
                                    </div>
<div class="container px-4 mx-auto">

    <div class="p-6 m-20 bg-white rounded shadow">
        {!! $chart->container() !!}
    </div>

</div>

<script src="{{ $chart->cdn() }}"></script>

{{ $chart->script() }}


@endsection

  