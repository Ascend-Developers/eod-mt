@extends('layouts.master')

@section('content')
<!-- Basic trigger modal -->
<div class="basic-modal">
    <div class="d-flex justify-content-end mb-1">
        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#default">Filter</button>
    </div>
<!-- Modal -->
    <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel1">Filters</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body"> 
                <form action="{{ route('eod.index') }}"  class="kt-form kt-form--fit mb-15" id="form-filter">
                    <div class="form-group">
                        <label for="">Site</label>
                        <select name="site_id" class="select2 select2" id="large-select-multi">
                            <option value="{{null}}" selected="selected">Select Options</option>
                            @if(Auth::user()->type == "agent")
                                @foreach (Auth::user()->sites as $site)
                                    <option value="{{$site->_id}}">
                                        {{$site->name}}
                                    </option>
                                @endforeach
                            @else
                                @foreach ($sites as $site)
                                    <option value="{{$site->id}}"> {{$site->name}} </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="modal-footer">
                        {{-- {{ Form::submit('Search', array('class' => 'btn btn-primary')) }}  --}}
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Basic trigger modal end -->
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('EOD Submissions') }}</h4>
                </div>
                <div class="card-body table-responsive w-100">
                    <table class="table responsive " id="site-table">
                        <thead>
                            <tr>
                                <th scope="col">Site Name</th>
                                <th scope="col">Item</th>
                                <th scope="col">New Stock Received</th>
                                <th scope="col">Test Taken</th>
                                <th scope="col">Stock Before Submission</th>
                                <th scope="col">Stock After Submission</th>
                                <th scope="col">Submitted By</th>
                                <th scope="col">Shift</th>
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
                                <td>{{$sub->shift}}</td>
                                <td>{{$sub->created_at->format('F j, Y, g:i a')}}</td>
                            </tr>
                            @endforeach
                            <tr>

                            </tr>
                        </tbody>
                    </table>
                </div>
                {{-- {{ $submissions->appends(Request::all())->links() }} --}}
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script>
    $('.select2').select2({
        placeholder: 'Select an option'
    });
</script>
@endpush
