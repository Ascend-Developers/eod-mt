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
            <div class="col-4">
                <form action="{{route('siteTracker')}}">
                    <label for="fp-default">Filter</label>
                    <input type="text" id="fp-default" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" name="date" />
                </form>
            </div>

        </div>
    </div>
    {{-- Tat During Shifts --}}
     {{-- submission by Site --}}
    <div class="col-8">
        <div class="row">
            {{-- submission by Site --}}
            <div class="col-md-4 ">
                <div class="card" >
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="card-body">
                                <h4 class="">Submission per site</h4>
                                <div class="row">
                                    @foreach ($sites as $site)
                                    <div class="col-12 mt-1">
                                        {{$site->name}}
                                        {{-- {{$site->hourlySub->count()}} --}}
                                        @php
                                            $date = request()->has('date') ? request()->date: Carbon\Carbon::today();
                                            $percentage = $site->getDateSubmissionProgress($date);
                                            $class = $site->getClass($percentage)
                                        @endphp
                                        {{-- --{{$percentage}} --}}
                                        <div class="progress " style="background-color:{{$class}}">
                                            <div class="progress-bar" role="progressbar" aria-valuenow="25" aria-valuemin="25" aria-valuemax="100" style="width: {{$percentage}}%">
                                                {{round($percentage)}}%
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
            {{-- Tat During Shifts --}}
            <div class="col-md-8">
                <div class="card" >
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="card-body">
                                <h4 class="">TAT during shift change</h4>
                                <div class="row">
                                    {!! $chart->container() !!}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
              {{-- Waiting TIme --}}
            <div class="col-md-12 ">
                <div class="card" >
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="card-body">
                                <h4 class="">Waiting Time</h4>
                                <div class="row">
                                    {!! $chart1->container() !!}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     {{-- Submission by PMO --}}
     <div class="col-md-4 ">
        <div class="card" >
            <div class="row">
                <div class="col-md-12 ">
                    <div class="card-body">
                        <h4 class="">Submission per PM0</h4>
                        <div class="row">
                            @foreach ($users as $user)
                            <div class="col-12 mt-1">
                                {{$user->name}}
                                {{-- {{$site->hourlySub->count()}} --}}
                                @php
                                    $date = request()->has('date') ? request()->date: Carbon\Carbon::today();
                                    $percentage = $user->getDateSubmissionProgress($date);
                                    $class = $user->getClass($percentage)
                                @endphp
                                {{-- --{{$percentage}} --}}
                                <div class="progress progress-bar-{{$class}}">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="25" aria-valuemin="25" aria-valuemax="100" style="width: {{$percentage}}%">
                                        {{round($percentage)}}%
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


</div>
</section>

<script src="{{ $chart->cdn() }}"></script>

{{ $chart->script() }}
{{ $chart1->script() }}
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
    $("#fp-default").change(function(){
        $('form').submit()
    })
</script>
@endpush
