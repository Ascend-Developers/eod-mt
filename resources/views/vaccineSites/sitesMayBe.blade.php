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
                                <th scope="col">Vaccine Site Name</th>
                                <th scope="col">NVR Name</th>
                                <th scope="col">cc</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sites as $n)
                            <tr>
                                <td>
                                    <a href="{{ route('vaccineSite.edit', $n) }}">
                                        {{ $n->name }} | {{ $n->region ? $n->region->name : ""  }} </td>

                                    </a>
                                @if($n->nvr)
                                    <td>{{ $n->nvr->name  }}  || {{ $n->nvr->region  }}</td>
                                @else
                                    <td>
                                        @php
                                            $sim = 0;
                                            $nnn = "";
                                            $reg = "";
                                            $cc= 0;
                                        @endphp
                                        @foreach(App\NVRSite::all() as $s)
                                            @if(similar_text($s->name, $n->name) > $sim)
                                                @php
                                                    $sim = similar_text($s->name, $n->name);
                                                    $nnn = $s->name;
                                                    $reg = $s->region;
                                                    $cc = $s->cc_id;
                                                @endphp
                                            @endif
                                        @endforeach
                                        <span class="badge badge-primary">Guess</span>
                                         {{ $nnn }}--{{ $cc }}--{{ $reg }}
                                    </td>
                                @endif
                                @if($n->nvr)
                                @if($n->nvr->cc_id > 0 && $n->nvr->cc_id < 9990)
                                <td class="alert alert-danger"> {{ $n->nvr->cc_id  }}</td>
                                @else
                                <td class="alert alert-success"> {{ $n->nvr->cc_id  }}</td>
                                @endif
                                @endif
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
