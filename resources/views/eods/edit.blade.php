@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('Edit Vaccine Site') }}</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('vaccineSite.update', $vaccineSites->id)}}" method="POST">
                        @method('PATCH')
                        @csrf
                            @include('vaccineSites.form')
                            <button type="submit" class="btn btn-outline-primary">Submit</button>
                    </form>
                    <div class="card-header">
                        <h4 class="card-title">Vaccine Site off Schedule</h4>
                    </div>
                    <div class="row">
                        <div class="col-lg-1">
                            @foreach($vaccineSites->offDays as $day)
                                <div class="badge badge-glow badge-danger" style="margin: 5%">
                                    {{ $day->offDays->format('d-m-y') }}
                                    <form action="{{ route('vaccineSite.delSchedule', $day->id) }}" method="POST" style="display: inline" class="schedule-delete" id="delete-schedule-{{$day->_id}}">
                                        @csrf
                                        @method('delete')
                                        <button class="" type="submit" style="background: none; border:none; display:inline, color:white"><i data-feather='x'></i></button>
                                    </form>
                                </div><br>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">{{ __('Vaccine Readiness Data') }}</div>

                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <td>Seha activation</td>
                            <td>NVR dashboard</td>
                            <td>Admin portal</td>
                            <td>HOS</td>
                            <td>EOD</td>
                            <td>Offline Mode</td>
                            <td>Ticketing System</td>
                            <td>Staff</td>
                            <td>Site Readiness</td>
                            <td>Freezer</td>
                            <td>PC</td>
                            <td>B-Code</td>
                            <td>Crash Cart</td>
                            <td>Epipen</td>
                        </thead>
                        <tbody>
                            <td>{{ ($vaccineSites->readinessData && $vaccineSites->readinessData->seha == "on") ? 'ready' : 'no'}}</td>
                            <td>{{ ($vaccineSites->readinessData && $vaccineSites->readinessData->nvr == "on") ? 'ready': 'no'}}</td>
                            <td>{{ ($vaccineSites->readinessData && $vaccineSites->readinessData->portal == "on") ? 'ready': 'no'}}</td>
                            <td>{{ ($vaccineSites->readinessData && $vaccineSites->readinessData->hos == "on") ? 'ready': 'no'}}</td>
                            <td>{{ ($vaccineSites->readinessData && $vaccineSites->readinessData->eod == "on") ? 'ready': 'no'}}</td>
                            <td>{{ ($vaccineSites->readinessData && $vaccineSites->readinessData->offline_mode == "on") ? 'ready': 'no'}}</td>
                            <td>{{ ($vaccineSites->readinessData && $vaccineSites->readinessData->ticketing_system == "on") ? 'ready': 'no'}}</td>
                            <td>{{ ($vaccineSites->readinessData && $vaccineSites->readinessData->staff == "on") ? 'ready': 'no'}}</td>
                            <td>{{ ($vaccineSites->readinessData && $vaccineSites->readinessData->site == "on") ? 'ready': 'no'}}</td>
                            <td>{{ ($vaccineSites->readinessData && $vaccineSites->readinessData->freezer == "on") ? 'ready': 'no'}}</td>
                            <td>{{ ($vaccineSites->readinessData && $vaccineSites->readinessData->pc == "on") ? 'ready': 'no'}}</td>
                            <td>{{ ($vaccineSites->readinessData && $vaccineSites->readinessData->b_code == "on") ? 'ready': 'no'}}</td>
                            <td>{{ ($vaccineSites->readinessData && $vaccineSites->readinessData->crash_cart == "on") ? 'ready': 'no'}}</td>
                            <td>{{ ($vaccineSites->readinessData && $vaccineSites->readinessData->epipen == "on") ? 'ready': 'no'}}</td>
                        </tbody>
                    </table>
                </div>
                <div class="card-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Type</th>
                                <th scope="col">Region</th>
                                <th scope="col">Phone no</th>
                                <th scope="col">Module</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vaccineSites->users as $user)
                            <tr>
                                <td>{{ $user->full_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->type }}</td>
                                <td>
                                    @foreach($user->regions as $region)
                                        {{ $region->name }},
                                    @endforeach
                                </td>
                                <td>{{ $user->phone }}</td>
                                <td> @foreach($user->modules as $module) {{$module->name}}, @endforeach</td>
                                <td>
                                    <a href="{{route('user.edit', $user->id)}}">Edit</a>
                                    |
                                     <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display: inline" class="macros-delete" id="delete-macros-{{$user->_id}}">
                                        @csrf
                                        @method('delete')
                                        <button class="text-danger selectDelBtn" type="submit" style="background: none; border:none; display:inline">Delete</button>
                                    </form>
                                    |
                                    <a href="{{ route('user.show', $user->id) }}">Show </a>
                                </td>
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
            $('.select2').select2({
                placeholder: 'Select an option'
            });
        $(document).on('submit','.schedule-delete',function(e){
            e.preventDefault();
            console.log("submit sections");
                // return false;
                let form = $(this).attr('id');
                var delete_id =$(this).closest("").find('.serDelValu').val();
                //alert(delete_id);
                swal({
                        position: 'top-end',
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover Site Schedule!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                    if (willDelete) {
                        e.currentTarget.submit();
                        swal({
                            position: 'top-end',
                            title: "Site Schedule",
                            text: "Site Schedule date is deleteded successfully",
                            icon: "success",
                        });
                    }else{

                    }
                    });
            });
            });
</script>
@endpush
