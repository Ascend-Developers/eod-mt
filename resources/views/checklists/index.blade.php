@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('Lab Per Shift Submissions') }}</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Site</th>
                                <th scope="col">no of staff</th>
                                <th scope="col">no of absence</th>
                                <th scope="col">no of results</th>
                                <th scope="col">no of rerun</th>
                                <th scope="col">no of equipment down</th>
                                <th scope="col">no of swabs received</th>
                                <th scope="col">no of swabs ptu</th>
                                <th scope="col">Shift</th>
                                {{-- <th scope="col">Submitted By</th> --}}
                                {{-- <th scope="col">Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($checklists as $shipment)
                            <tr>
                                <td>{{ $shipment->site ?  $shipment->site->name : "--"}}</td>
                                <td>{{ $shipment->no_of_staff }}</td>
                                <td>{{ $shipment->no_of_absence }}</td>
                                <td>{{ $shipment->no_of_results }}</td>
                                <td>{{ $shipment->no_of_rerun }}</td>
                                <td>{{ $shipment->no_of_equipment_down }}</td>
                                <td>{{ $shipment->no_of_swabs_received }}</td>
                                <td>{{ $shipment->no_of_swabs_ptu }}</td>
                                <td>{{ $shipment->shift }}</td>
                                {{-- <td>{{ $shipment->user ?  $shipment->user->name : "--"}}</td> --}}
                                {{-- <td>
                                    <a href="{{route('shipment.edit', $shipment->id)}}"><i data-feather='edit'></i></a>
                                    |
                                    <form action="{{ route('shipment.destroy', $shipment->id) }}" method="POST" style="display: inline" class="macros-delete" id="delete-macros-{{$shipment->_id}}">
                                        @csrf
                                        @method('delete')
                                        <button class="text-danger selectDelBtn" type="submit" style="background: none; border:none; display:inline"><i data-feather='delete'></i></button>
                                    </form>
                                    |
                                    <a href="{{ route('shipment.show', $shipment->id) }}"><i data-feather='eye'></i></a>
                                </td> --}}
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-5">
                {!! $checklists->links() !!}
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
                        text: "Once deleted, you will not be able to recover shipment!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                    if (willDelete) {
                        e.currentTarget.submit();
                        swal({
                            position: 'top-end',
                            title: "shipment",
                            text: "shipment is deleted successfully",
                            icon: "success",
                        });
                    }else{

                    }
                    });
            });
            });


    </script>
@endpush
