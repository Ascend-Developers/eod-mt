@extends('layouts.master')

@section('content')
    <section class="bootstrap-select row">
        {{-- headings and filters --}}
        <div class="col-12">
            <div class="row">
                <div class="col-8">
                    <h1 class="font-large-1 font-weight-bolder mt-2 mb-2">
                        Site Tracker
                    </h1>
                </div>
                <div class="col-md-4 mb-1">
                    <form action="{{ route('siteTracker') }}">
                        <label for="fp-default">Filter</label>
                        <input type="text" id="fp-default" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD"
                            name="date" />
                    </form>
                </div>

            </div>
        </div>

        {{-- Tat During Shifts --}}

        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12 ">
                    <div class="container px-0 mx-auto">
                        <div class="card">

                            <div class="card-body">
                                <h4 class="">
                                    <img src="\app-assets\images\ico\tag (1).png">
                                    Waiting time per site during shift hours (minutes)
                                </h4>
                                {!! $chart->container() !!}

                            </div>
                        </div>
                        {{-- <div class="pr-1 m-20 bg-white rounded shadow">
                        </div> --}}
                    </div>
                </div>

                <div class="col-sm-12 mt-2 ">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="">
                                <img src="\app-assets\images\ico\tag (1).png">
                                Submission per site
                            </h4>

                            <div class="row">
                                @foreach ($sites as $site)
                                    <div class="col-12 mt-1">
                                        <div class="row">
                                            @php
                                                $date = request()->has('date') ? request()->date : Carbon\Carbon::today();
                                                $percentage = $site->getDateSubmissionProgress($date);
                                                $count = $site->getSiteCount($date);
                                                $class = $site->getClass($percentage);
                                            @endphp
                                            <div class="col-6">
                                                {{ $site->name }}

                                            </div>
                                            <div class="col-6 spr-head {{ $class }}">
                                                {{ $count }}
                                            </div>
                                        </div>


                                        {{-- --{{$percentage}} --}}
                                        <div class="progress  {{ $class }}" style="background-color:#EFEFF4">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="25"
                                                aria-valuemin="25" aria-valuemax="100" style="width: {{ $percentage }}%">
                                                {{ $count }}

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>




        {{-- Submission by PMO --}}
        <div class="col-md-4 ">
            <div class="card">
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="card-body">
                            <h4 class=""><img src="\app-assets\images\ico\tag (2).png"> Submission per PM0
                            </h4>
                            <div class="row">
                                @foreach ($users as $user)
                                    <div class="col-12 mt-1">
                                        <div class="row">
                                            @php
                                                $date = request()->has('date') ? request()->date : Carbon\Carbon::today();
                                                $percentage = $user->getDateSubmissionProgress($date);
                                                $count = $user->getUserCount($date);
                                                $class = $user->getClass($percentage);
                                            @endphp
                                            <div class="col-6">{{ $user->name }} ({{$user->LasthourlySub ?
                                            $user->LasthourlySub->first()->site?->name : ""}})</div>

                                            <div class="col-6 pmo-head {{ $class }}">
                                                {{ $count }}
                                            </div>
                                        </div>

                                        {{-- --{{$percentage}} --}}
                                        <div class="progress {{ $class }}" style="background-color:#EFEFF4">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="25"
                                                aria-valuemin="25" aria-valuemax="100" style="width: {{ $percentage }}%">
                                                {{ $count }}

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <div class="col-md-4 mb-1">
            <div class="row">
                <div class="col-md-12">
                    <div class="container px-0 mx-auto">
                        <div class="p-6 m-20 bg-white rounded shadow"> --}}
        {{-- <h4> <img src="\app-assets\images\ico\tag (3).png"> Attendence</h4> --}}

        {{-- <div class="tag6 ml-1"></div> --}}
        {{-- {!! $chart2->container() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}


        {{-- User submition info --}}
        <div class="col-md-12">
            <div class="row">
                @foreach ($userDataWaitingTime as $us)
                    <div class="col-lg-2 col-md-2 col-sm-6">
                        <div class="card" style="width: 105%;">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <div class="card-body">
                                        <h4 class=""><img src="\app-assets\images\ico\tag.png">
                                            {{ $us['name'] }}</h4>
                                        <ul>
                                            <li>First Upload <span
                                                    style="color: #553AFE">{{ $us['firstSiteSubmission'] }}</span></li>
                                            <li>Last Upload <span
                                                    style="color: #01C0F6">{{ $us['lastSiteSubmission'] }}</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>



    </section>

    <script src="{{ $chart->cdn() }}"></script>

    {{ $chart->script() }}
    {{ $chart1->script() }}
    {{ $chart2->script() }}
@endsection

@push('script')
    <script>
        // let date = new Date()
        let searchParams = new URLSearchParams(window.location.search);
        let param = searchParams.get('date');
        let date = param ? param : new Date();
        $(".flatpickr-basic").flatpickr({
            defaultDate: date
        });
        $("#fp-default").change(function() {
            $('form').submit()
        })
    </script>
@endpush
