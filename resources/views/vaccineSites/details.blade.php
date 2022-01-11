@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Vacine Site Details') }}</div>

                <div class="card-body">
                    <h5><strong>Name : </strong>{{$vaccineSite->name}}</h5>
                    <h5><strong>Name (Arabic) : </strong>{{$vaccineSite->name_ar}}</h5>
                    <h5><strong>Region : </strong>{{$vaccineSite->region->name}}</h5>
                    <h5><strong>CCID : </strong>{{$vaccineSite->nvr ? $vaccineSite->nvr->cc_id : "--"}}</h5>
                    <h5><strong>Sector: </strong>{{ $vaccineSite->moh }}</h5>
                    <h5><strong>Active : </strong>{{ $vaccineSite->active == true ? "yes" : "no" }}</h5>
                    <h5><strong>Premium : </strong>{{ $vaccineSite->premium == true ? "yes" : "no" }}</h5>
                    <h5><strong>NVR : </strong>{{ $vaccineSite->nvr ? $vaccineSite->nvr->name : "--" }}</h5>
                    <h5><strong>Vaccine Type : </strong>{{ $vaccineSite->vaccineType }}</h5>
                    <h5><strong>Off Days : </strong>@foreach($vaccineSite->offDays as $day)<div class="badge badge-glow badge-danger" style="margin-left: 1%">{{ $day->offDays->format('d-m-y') }}</div>@endforeach</h5>
                    <h5><strong>Last Update by : </strong>{{ $vaccineSite->lastUpdateUser }} | {{ $vaccineSite->updated_at->format('d-m-y') }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
