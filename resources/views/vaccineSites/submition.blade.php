@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="card-header col-md-10">{{ __('Submition Vaccine Sites') }}</div>
                    <!-- <div class="card-header col-md-2"><a class="btn btn-primary" href="{{action('VaccineSiteController@export')}}">Export</a></div> -->
                </div>
                <div class="card-body table-responsive w-100">
                    <table class="table responsive " id="submition-table">
                        <thead>
                            <tr>
                                <th scope="col">Date of Report</th>
                                <th scope="col">Site</th>
                                <th scope="col">Region</th>
                                <th scope="col">New Stock Received</th>
                                <th scope="col">From the freezer to the fridge (Pfizer)</th>
                                <th scope="col">From the fridge to vaccination point(Pfizer)</th>
                                <th scope="col"># Of Diluted</th>
                                <th scope="col">Stock(Start of the day)</th>
                                <th scope="col"># Of vaccinated</th>
                                <th scope="col">MOH</th>
                                <th scope="col">Daily Waste</th>
                                <th scope="col">Stock(EOD)</th>
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
                $('#submition-table').DataTablesSubmition({
                    processing: true,
                    serverSide: true,
                    responsive: true,
                    ajax: '{!! route('vaccine.submitiondatatable') !!}',
                    columns: [
                        { data: 'dateReport', name: 'Date of Report'},
                        { data: 'site', name: 'Site'},
                        { data: 'region', name: 'Region'},
                        { data: 'newRecStoc', name: 'New Stock Received' , searchable: false},
                        { data: 'freezerToFridge', name: 'From the freezer to the fridge (Pfizer)' , searchable: false},
                        { data: 'freezerToVaccinePoint', name: 'From the fridge to vaccination point(Pfizer)' , searchable: false},
                        { data: 'noDiluted', name: '# Of Diluted' , searchable: false},
                        { data: 'stockSOD', name: 'Stock(Start of the day)' , searchable: false},
                        { data: 'noVaccinated', name: '# Of vaccinated' , searchable: false},
                        { data: 'moh', name: 'MOH' , searchable: false},
                        { data: 'dailyWast', name: 'Daily Waste' , searchable: false},
                        { data: 'stockEOD', name: 'Stock(EOD)' , searchable: false},
                        { data: 'action', name: 'Actions' , searchable: false},
                    ]
                });
            });

    </script>
@endpush
