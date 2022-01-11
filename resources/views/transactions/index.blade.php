@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Regions') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">From Type</th>
                                <th scope="col">From To</th>
                                <th scope="col">Dispatch Type</th>
                                <th scope="col">Dispatch To</th>
                                <th scope="col">Status</th>
                                <th scope="col">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($trans as $t)
                            <tr>
                                <td>{{ $t->from_type }}</td>
                                <td>{{ $t->from ? $t->from->name : "--"  }}</td>
                                <td>{{ $t->to_type }}</td>
                                <td>{{ $t->to ? $t->to->name : "--"  }}</td>
                                <td>{{ $t->status }}</td>
                                <td>{{ $t->amount }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script>
        $(document).ready(function(){
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
                        text: "Once deleted, you will not be able to recover Region!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                    if (willDelete) {
                        e.currentTarget.submit();
                        swal({
                            position: 'top-end',
                            title: "Region",
                            text: "Region is deleted successfully",
                            icon: "success",
                        });
                    }else{

                    }
                    });
            });
            });


    </script>
@endpush
