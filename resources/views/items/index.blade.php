@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="card-header col-md-10">{{ __('Items') }}</div>
                    {{-- <div class="card-header col-md-2"><a class="btn btn-primary" href="{{action('VaccineSiteController@export')}}">Export</a></div> --}}
                </div>
                <div class="card-body table-responsive w-100">
                    <table class="table responsive " id="site-table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>

                        </thead>
                        <tbody>
                            @foreach ($items as $site)
                            <tr>
                                <td>{{$site->name}}</td>
                            </tr>
                            @endforeach
                            <tr>

                            </tr>
                        </tbody>
                    </table>
                </div>
                {{-- {{ $vaccineSites->appends(Request::all())->links() }} --}}
            </div>
        </div>
    </div>
</div>
@endsection
