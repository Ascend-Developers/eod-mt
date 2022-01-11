@extends('layouts.master')

@section('content')
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
                                <th scope="col">t1</th>
                                <th scope="col">t2</th>
                                <th scope="col">t3</th>
                                <th scope="col">Status</th>
                                <th scope="col">Submitted By</th>
                                <th scope="col">Date of Report</th>
                                {{-- <th scope="col">Action</th> --}}
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
                                <th>{{ $wt->created_at }}</th>
                                {{-- <th>
                                    <a href="{{route('waiting.edit', $wt->id)}}">Edit</a>
                                    |
                                    <form action="{{ route('waiting.destroy', $wt->id) }}" method="POST" style="display: inline" class="macros-delete" id="delete-macros-{{$wt->_id}}">
                                        @csrf
                                        @method('delete')
                                        <button class="text-danger selectDelBtn" type="submit" style="background: none; border:none; display:inline">Delete</button>
                                    </form>
                                </th> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- {{$users->appends(Request::all())->links()}} --}}
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
