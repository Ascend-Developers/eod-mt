@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-11">  
        </div>
        <div class="col-md-1">
            <div class="card-title"><a class="btn btn-primary" href="{{route('ratsa.export')}}">Export</a></div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('Rapid Antigen Site Audit') }}</h4>
                </div>
                <div class="card-body table-responsive w-100">
                    <table class="table table-bordered" id="user-table">
                        <thead>
                            <tr>
                                <th scope="col">Site Name</th>
                                <th scope="col">Cabin Numbers</th>
                                <th scope="col">Training sample withdrawl</th>
                                <th scope="col">Training RAT use</th>
                                <th scope="col">Training in use of HESN</th>
                                <th scope="col">Rapid Antigen Test Batch Check</th>
                                <th scope="col">Correct swab and cassette labeling</th>
                                <th scope="col">Infection Control / PPE</th>
                                <th scope="col">Waste Disposal</th>
                                <th scope="col">Preparation of extraction tubes</th>
                                <th scope="col">Non reacting cassettes</th>
                                <th scope="col">Health and Safety</th>
                                <th scope="col">Submitted By</th>
                                <th scope="col">Report Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ratsas as $ratsa)
                            <tr>
                                <th>{{$ratsa->site ? $ratsa->site->name : "--"}}</th>
                                <th>{{$ratsa->cabinNo}}</th>
                                <th>{{$ratsa->trainingSampleWithdrawal}}</th>
                                <th>{{$ratsa->trainingRATUse}}</th>
                                <th>{{$ratsa->trainingInUseOfESN}}</th>
                                <th>{{$ratsa->rapidAntigenTestBatchCheck}}</th>
                                <th>{{$ratsa->correctSwabAndCassetteLabeling}}</th>
                                <th>{{$ratsa->infectionControl_PPE}}</th>
                                <th>{{$ratsa->wasteDisposal}}</th>
                                <th>{{$ratsa->preparationOfExtractionTubes}}</th>
                                <th>{{$ratsa->nonReactingCassettes}}</th>
                                <th>{{$ratsa->healthAndSafety}}</th>
                                <th>{{$ratsa->user ? $ratsa->user->name: "--"}}</th>
                                <th>{{ $ratsa->created_at->format('F j, Y, g:i a') }}</th>
                                <th>
                                    {{-- <a href="{{route('waiting.edit', $ratsa->id)}}"><i data-feather='edit'></i></a>
                                    <form action="{{ route('waiting.destroy', $ratsa->id) }}" method="POST" style="display: inline" class="macros-delete" id="delete-macros-{{$ratsa->_id}}">
                                        @csrf
                                        @method('delete')
                                        <button class="text-danger selectDelBtn" type="submit" style="background: none; border:none; display:inline"><i data-feather='delete'></i></button>
                                    </form>
                                    --}}
                                    <a style="color: green;" href="{{route('ratsas.show', $ratsa->_id)}}"><i data-feather='eye'></i></a>
                                </th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-5">
                {!! $ratsas->links() !!}
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
                    text: "Once deleted, you will not be able to recover Audit!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    e.currentTarget.submit();
                    swal({
                        position: 'top-end',
                        title: "Rapid Antigen Site Audit",
                        text: "Audit is deleted successfully",
                        icon: "success",
                    });
                }else{

                }
                });
        });
        });
</script>
@endpush
