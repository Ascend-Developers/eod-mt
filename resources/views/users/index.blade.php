@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="card-header col-md-10">{{ __('User') }}</div>
                    <div class="card-header col-md-2"><a class="btn btn-primary" href="{{action('UserController@export')}}">Export</a></div>
                </div>
                <div class="card-body table-responsive w-100">
                    <table class="table responsive " id="user-table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Type</th>
                                <th scope="col">Vaccine Site</th>
                                <th scope="col">Region</th>
                                <th scope="col">Phone no</th>
                                <th scope="col">Module</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

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
                        text: "Once deleted, you will not be able to recover User!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                    if (willDelete) {
                        e.currentTarget.submit();
                        swal({
                            position: 'top-end',
                            title: "User",
                            text: "User is deleted successfully",
                            icon: "success",
                        });
                    }else{

                    }
                    });
            });
            });


            $(function() {
                $('#user-table').DataTable({
                    processing: true,
                    serverSide: false,
                    responsive: true,
                    ajax: '{!! route('user.datatable') !!}',
                    columns: [
                        { data: 'name', name: 'name' ,searchable: true},
                        { data: 'email', name: 'email' ,searchable: true},
                        { data: 'type', name: 'type',searchable: true },
                        { data: 'vaccineSite', name: 'vaccine site' ,searchable: true},
                        { data: 'region', name: 'region',searchable: true },
                        { data: 'phone', name: 'phone' ,searchable: true},
                        { data: 'module', name: 'module' ,searchable: true},
                        { data: 'action', name: 'action' },
                    ]
                });
            });
    </script>
@endpush
