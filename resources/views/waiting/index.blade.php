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
                    <h4 class="card-title">{{ __('Waiting Time') }}</h4>
                </div>
                <div class="card-body table-responsive w-100">
                    <table class="table responsive " id="user-table">
                        <thead>
                            <tr>
                                <th scope="col">Site Name</th>
                                <th scope="col">t1<span style="font-size: 70%"> (Arrival to cabin)</span></th>
                                <th scope="col">t2<span style="font-size: 70%"> (At cabin)</span></th>
                                <th scope="col">t3<span style="font-size: 70%"> (Total TAT)</span></th>
                                <th scope="col">Status</th>
                                <th scope="col">Submitted By</th>
                                <th scope="col">Date of Report</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($wts as $wt)
                            <tr>
                                <th>{{$wt->site ? $wt->site->name : "--"}}</th>
                                <th>{{$wt->t1}}</th>
                                <th>{{$wt->t2}}</th>
                                <th>{{$wt->t3}}</th>
                                <th>
                                    @if($wt->t3 < 20)
                                        <span class="badge badge-success" >Green</span>
                                    @else
                                        <span class="badge badge-danger" >Red</span>
                                    @endif
                                </th>

                                <th>{{$wt->user ? $wt->user->name: "--"}}</th>
                                <th>{{ $wt->created_at->format('F j, Y, g:i a') }}</th>
                                <th>
                                    {{-- <a href="{{route('waiting.edit', $wt->id)}}"><i data-feather='edit'></i></a>
                                    |
                                    <form action="{{ route('waiting.destroy', $wt->id) }}" method="POST" style="display: inline" class="macros-delete" id="delete-macros-{{$wt->_id}}">
                                        @csrf
                                        @method('delete')
                                        <button class="text-danger selectDelBtn" type="submit" style="background: none; border:none; display:inline"><i data-feather='delete'></i></button>
                                    </form>
                                    | --}}
                                    <a style="color: green;" href="{{route('waiting.show', $wt->_id)}}"><i data-feather='eye'></i></a>
                                </th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- {{$wts->appends(Request::all())->links()}} --}}
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="//cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>

<script>
    $(document).ready(function(){
        $('.select2').select2({
            placeholder: 'Select an option'
        });
    $(document).on('submit','.macros-delete',function(e){
        e.preventDefault();
        console.log("submit sections");
            // return false;
            let form = $(this).attr('id');
            var delete_id =$(this).closest("").find('.serDelValu').val();
            //alert(delete_id);
            swal({
                    position: 'top-end',
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover EOD!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    e.currentTarget.submit();
                    swal({
                        position: 'top-end',
                        title: "EOD",
                        text: "EOD is deleted successfully",
                        icon: "success",
                    });
                }else{

                }
                });
        });
        });
</script>
@endpush
