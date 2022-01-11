@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('Users') }}</h4>
                </div>
                <div class="card-body table-responsive w-100">
                    <table class="table responsive " id="user-table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Type</th>
                                <th scope="col"> Site</th>
                                <th scope="col">Phone no</th>
                                <th scope="col">Module</th>
                                <th scope="col">Category</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <th>{{$user->name}}</th>
                                <th>{{$user->email}}</th>
                                <th>{{$user->type}}</th>
                                <th>{{$user->sites ? $user->sites->pluck('name') : "--"}}</th>
                                {{-- <th>{{$user->sites ? implode($user->sites->pluck('name')) : "--"}}</th> --}}
                                <th>{{$user->phone}}</th>
                                <th>{{$user->module_ids ? implode($user->module_ids) : "--"}}</th>
                                <th>{{$user->category}}</th>
                                <th>
                                    <a href="{{route('user.edit', $user->id)}}">Edit</a>
                                    |
                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display: inline" class="macros-delete" id="delete-macros-{{$user->_id}}">
                                        @csrf
                                        @method('delete')
                                        <button class="text-danger selectDelBtn" type="submit" style="background: none; border:none; display:inline">Delete</button>
                                    </form>
                                </th>
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
</script>
@endpush
