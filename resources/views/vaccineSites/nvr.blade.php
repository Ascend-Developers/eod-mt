@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="row px-2">
                    <div class="card-header col-md-10">{{ __('Vaccine Sites') }}</div>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">NVR Name</th>
                                <th scope="col">Mapped Vaccine Sites</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($nvr as $n)
                            <tr>
                                <td>{{ $n->name }}--{{ $n->region }}--{{ $n->cc_id }}</td>
                                <td>{{ $n->vaccineSite ? $n->vaccineSite->name  : "No NVR Mapped" }}  -- {{ $n->vaccineSite ? $n->vaccineSite->region ? $n->vaccineSite->region->name : "No NVR Mapped"  : "No NVR Mapped" }}</td>
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
