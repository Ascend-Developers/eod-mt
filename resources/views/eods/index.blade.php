@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11">  
        </div>
        <div class="col-md-1">
            <div class="card-title"><a class="btn btn-primary" href="{{route('eod.export')}}">Export</a></div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">EOD Submissions ({{ $subCount }})</h4>
                </div>
                <div class="card-body table-responsive w-100">
                    <table class="table table-bordered" id="user-table">
                        <thead>
                            <tr>
                                <th scope="col">Site Name</th>
                                <th scope="col">Item</th>
                                <th scope="col">New Stock Received</th>
                                <th scope="col">Test Taken</th>
                                <th scope="col">Stock Before Submission</th>
                                <th scope="col">Stock After Submission</th>
                                <th scope="col">Submitted By</th>
                                <th scope="col">Created At</th>

                        </thead>
                        <tbody>
                            @foreach ($submissions as $sub)
                            <tr>
                                <td>{{$sub->site ? $sub->site->name : '--'}}</td>
                                <td>{{$sub->item ? $sub->item->name : '--'}}</td>
                                <td>{{$sub->newStockRec}}</td>
                                <td>{{$sub->test}}</td>
                                <td>{{$sub->intialStock}}</td>
                                <td>{{$sub->eodStock}}</td>
                                <td>{{$sub->user ? $sub->user->name : '--'}}</td>
                                <td>{{$sub->created_at->format('F j, Y, g:i a')}}</td>
                            </tr>
                            @endforeach
                            <tr>

                            </tr>
                        </tbody>
                    </table>
                </div>
                {{-- {{ $vaccineSites->appends(Request::all())->links() }} --}}
            </div>
            <div class="d-flex justify-content-center mt-5">
                {!! $submissions->links() !!}
            </div>
        </div>
    </div>
</div>
@endsection
