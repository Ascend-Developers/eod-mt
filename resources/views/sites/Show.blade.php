@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title col-md-11">{{ __('Site Details') }}</h4>
                    <h4 class="card-title col-md-1">
                        <a href="{{route('site.edit', $site->id)}}" style="color: white"><i data-feather='edit'></i></a>
                        <form action="{{ route('site.destroy', $site->id) }}" method="POST" style="display: inline" class="macros-delete" id="delete-macros-{{$site->_id}}">
                            @csrf
                            @method('delete')
                            <button class="=selectDelBtn" type="submit" style="background: none; border:none; display:inline; color: white"><i data-feather='delete'></i></button>
                        </form>
                    </h4>
                </div>
                <div class="card-body">
                
                    <h5><strong>Name : </strong>{{$site->name}}</h5>
                    <h5><strong>Major Site : </strong>{{$site->type}}</h5>
                    <h5><strong>Site Type : </strong>{{$site->siteType}}</h5>
                    <h5><strong>Region : </strong>{{$site->region ? $site->region->name : "--"}}</h5>
                </div>
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
