@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="card-header col-md-10">{{ __('Vaccine Site Logs') }}</div>
                    <!-- <div class="card-header col-md-2"><a class="btn btn-primary" href="{{action('UserController@export')}}">Export</a></div> -->
                </div>
                <div class="card-body table-responsive w-100">
                    <table class="table responsive " id="logs-table">
                        <thead>
                            <tr>
                                <th scope="col">User Name</th>
                                <th scope="col">Vaccine site Name</th>
                                <th scope="col">Action Type</th>
                                <th scope="col">Action Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($logs as $log)
                                <tr>
                                    <td>{{$log->user ? $log->user->name : "--"}}</td>
                                    <td>{{$log->vaccineSites ? $log->vaccineSites->name : "--"}}</td>
                                    <td>{{$log->actionType}}</td>
                                    <td>{{$log->actionDetails}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{$logs->appends(Request::all())->links()}}
            </div>
        </div>
    </div>
</div>
@endsection 