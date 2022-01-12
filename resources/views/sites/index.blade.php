@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('Site') }}</h4>
                </div>
                <div class="card-body table-responsive w-100">
                    <table class="table responsive " id="site-table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Type</th>
                                <th scope="col">Region</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sites as $site)
                            <tr>
                                <td>{{$site->name}}</td>
                                <td>{{$site->type}}</td>
                                <td>{{$site->region ? $site->region->name : "--"}}</td>
                                <td>
                                    <a href="{{route('site.edit', $site->id)}}"><i data-feather='edit'></i></a>
                                    |
                                    <form action="{{ route('site.destroy', $site->id) }}" method="POST" style="display: inline" class="macros-delete" id="delete-macros-{{$site->_id}}">
                                        @csrf
                                        @method('delete')
                                        <button class="text-danger selectDelBtn" type="submit" style="background: none; border:none; display:inline"><i data-feather='delete'></i></button>
                                    </form>
                                    |
                                    <a href="{{ route('site.show', $site->id) }}"><i data-feather='eye'></i></a>
                                </td>
                            </tr>
                            @endforeach
                            <tr>

                            </tr>
                        </tbody>
                    </table>
                </div>
                {{-- {{ $vaccineSites->appends(Request::all())->links() }} --}}
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
                        text: "Once deleted, you will not be able to recover Site!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                    if (willDelete) {
                        e.currentTarget.submit();
                        swal({
                            position: 'top-end',
                            title: "Site",
                            text: "Site is deleted successfully",
                            icon: "success",
                        });
                    }else{

                    }
                    });
            });
            });


    </script>
@endpush
