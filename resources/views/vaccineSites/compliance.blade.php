@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="row px-2">
                    <div class="card-header col-md-10">{{ __('Vaccine Sites') }}</div>
                </div>
                <form action="{{ route('report.compliance') }}" class="row px-2">
                    <div class="form-group col-3 ">
                        <label for="">Moh</label>
                        <select name="moh" id="" class="form-control">
                            <option value="{{ null }}">Select Option</option>
                            <option value="{{ true }}">Active</option>
                            <option value="{{ false }}">Not Active</option>
                        </select>
                    </div>
                    <div class="form-group col-3 ">
                        <label for="">Date</label>
                        <input type="date" name="date" class="form-control">
                    </div>
                    <div class="form-group col-12">
                        <button class="btn btn-primary">Filter</button>
                    </div>
                </form>
                <div class="card-body">
                    <h2>Report For {{ (Request::get('date')) ? Request::get('date'): Carbon\Carbon::now() }}</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Region</th>
                                <th scope="col">Sites submissions per region</th>
                                <th scope="col">Active sites per region</th>
                                <th scope="col">EOD submission indicator</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $totalSub = 0;
                            $totalVac = 0;
                            @endphp
                            @foreach($regions as $region)
                            @php
                                $totalSubDate = (Request::get('date')) ? $region->getTotalSubmissions(Request::get('date')): $region->getTotalSubmissions(Carbon\Carbon::now());
                            @endphp
                            <tr>
                                <td>{{ $region->name }}</td>
                                <td>{{ $totalSubDate }} </td>
                                <td>{{ $region->activeVaccineSites->count() }}</td>
                                @php
                                    $per = 0;
                                    if($region->activeVaccineSites->count() > 0)
                                    $per = ($totalSubDate /  $region->activeVaccineSites->count()) *100
                                @endphp
                                <td>
                                    @if($per < 70)
                                    <span class="badge badge-light-danger">{{ round($per , 2) }}%</span>
                                    @elseif($per < 89)
                                    <span class="badge badge-light-warning">{{ round($per , 2) }}%</span>
                                    @else
                                    <span class="badge badge-light-success">{{ round($per , 2) }}%</span>
                                    @endif
                                </td>
                                @php
                                $totalSub = $totalSub + $totalSubDate;
                                $totalVac = $totalVac + $region->activeVaccineSites()->count();
                                @endphp
                            </tr>
                            @endforeach
                            <tr style="background: #e3e3e3">
                                <td>Total</td>
                                <td>{{ $totalSub }}</td>
                                <td>{{ $totalVac }}</td>
                                @php
                                    $totalPer = ($totalSub/$totalVac)*100;
                                @endphp
                                <td >
                                    @if($totalPer < 70)
                                    <span class="badge badge-light-danger">{{ round($totalPer , 2) }}%</span>
                                    @elseif($totalPer < 89)
                                    <span class="badge badge-light-warning">{{ round($totalPer , 2) }}%</span>
                                    @else
                                    <span class="badge badge-light-success">{{ round($totalPer , 2) }}%</span>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
