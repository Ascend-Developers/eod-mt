@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="card-header col-md-10">{{ __('Vaccine Sites') }}</div>
                    <div class="card-header col-md-2"><a class="btn btn-primary" href="{{action('VaccineSiteController@export')}}">Export</a></div>
                </div>
                <div class="card-body table-responsive w-100">
                    <table class="table responsive " id="site-table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Name (Arabic)</th>
                                <th scope="col">Region</th>
                                <th scope="col">NVR</th>
                                <th scope="col">Sector</th>
                                <th scope="col">Active</th>
                                <th scope="col"># of Users</th>
                                <th scope="col">Last Upload</th>
                                <th scope="col">Stock</th>
                                <th scope="col">Vaccinated</th>
                                <th scope="col">Appointment</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

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
                        text: "Once deleted, you will not be able to recover Vaccine Site!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                    if (willDelete) {
                        e.currentTarget.submit();
                        swal({
                            position: 'top-end',
                            title: "Vaccine Site",
                            text: "Vaccine Site is deleted successfully",
                            icon: "success",
                        });
                    }else{

                    }
                    });
            });
            });


            $(function() {
                $('#site-table').DataTable({
                    processing: true,
                    serverSide: false,
                    responsive: true,
                    ajax: '{!! route('vaccine.datatable') !!}',
                    columns: [
                        { data: 'name', name: 'name' },
                        { data: 'name_ar', name: 'name arabic' },
                        { data: 'region', name: 'region' },
                        { data: 'nvr', name: 'nvr' },
                        { data: 'sector', name: 'sector'},
                        { data: 'active', name: 'active' , searchable: false},
                        { data: 'noUsers', name: '# of Users' , searchable: false},
                        { data: 'lastUpload', name: 'Last Upload' , searchable: false},
                        { data: 'stock', name: 'Stock' , searchable: false},
                        { data: 'vaccinated', name: 'Vaccinated' , searchable: false},
                        { data: 'appointment', name: 'appointment' , searchable: false},
                        { data: 'action', name: 'action' , searchable: false},
                    ]
                });
            });

    </script>
@endpush
