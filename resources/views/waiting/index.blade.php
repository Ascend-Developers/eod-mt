@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11">  
        </div>
        <div class="col-md-1">
            <div class="card-title"><a class="btn btn-primary" href="{{route('waiting.export')}}">Export</a></div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('MT hourly checklist status') }}</h4>
                </div>
                <div class="card-body table-responsive w-100">
                    <table class="table table-bordered" id="user-table">
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
                                    @if($wt->t3 > -1 && $wt->t3 < 21)
                                        <span class="badge badge-success" >Green</span>
                                    @elseif($wt->t3 > 20 && $wt->t3 < 46)
                                        <span class="badge badge-warning" >Yellow</span>
                                    @elseif($wt->t3 > 45 && $wt->t3 < 121)
                                        <span class="badge badge-danger" >Red</span>
                                    @else
                                        <span class="badge badge-dark" >Black</span>
                                    @endif
                                </th>

                                <th>{{$wt->user ? $wt->user->name: "--"}}</th>
                                <th>{{ $wt->created_at->format('F j, Y, g:i a') }}</th>
                                <th>
                                    @if (Auth::user()->type == "admin")
                                    <a href="{{route('waiting.edit', $wt->id)}}"><i data-feather='edit'></i></a>
                                    <form action="{{ route('waiting.destroy', $wt->id) }}" method="POST" style="display: inline" class="macros-delete" id="delete-macros-{{$wt->_id}}">
                                        @csrf
                                        @method('delete')
                                        <button class="text-danger selectDelBtn" type="submit" style="background: none; border:none; display:inline"><i data-feather='delete'></i></button>
                                    </form>
                                    @endif
                                    <a style="color: green;" href="{{route('waiting.show', $wt->_id)}}"><i data-feather='eye'></i></a>
                                </th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-5">
                {!! $wts->links() !!}
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
                    text: "Once deleted, you will not be able to recover Hourly Checklist Status!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    e.currentTarget.submit();
                    swal({
                        position: 'top-end',
                        title: "Hourly Checklist Status",
                        text: "Hourly Checklist Status is deleted successfully",
                        icon: "success",
                    });
                }else{

                }
                });
        });
        });
</script>
@endpush
