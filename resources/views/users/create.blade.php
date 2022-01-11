@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Add User') }}</div>

                <div class="card-body">
                    <form action="{{route('user.store')}}" method="POST">
                        @csrf
                            @include('users.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    $('.select2').select2({
        placeholder: 'Select an option'
    });
    $("#user-sertor").hide()
    $(document).on('change','#user-type',function(e){
        $val = $("#user-type").val()

        if($val === "agent"){
            $("#user-sertor").hide()
        }
        if($val === "region_head"){
            $("#user-sertor").hide()
        }
        if($val === "admin"){
            $("#user-sertor").hide()
        }
        if($val === "sector_head"){
            $("#user-sertor").show()
        }
        if($val === "null"){
            $("#user-sertor").hide()
        }
    })
</script>
@endpush
