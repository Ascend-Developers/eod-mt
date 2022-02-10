@extends('layouts.master')

@section('content')


<section class="bootstrap-select">
    <div class="col-md-4 ">
        <div class="card" >
            <div class="row">
                <div class="col-md-12 ">
                    <div class="card-body">
                        <h4 class="mb-4">Submission per site</h4>
                        <div class="row">
                            @foreach ($sites as $site)
                            <div class="col-12">
                                {{$site->name}} {{$site->hourlySub->pluck('created_at')}}
                                <div class="progress progress-bar-primary">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="25" aria-valuemin="25" aria-valuemax="100" style="width: 25%"></div>
                                </div>
                            </div>

                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

