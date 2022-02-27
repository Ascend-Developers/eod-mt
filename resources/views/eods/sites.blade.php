@extends('layouts.master')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('Site Inventory') }}</h4>
                </div>
                <div class="card-body table-responsive w-100">
                    @php
                        $items = App\Models\Item::pluck('name');
                    @endphp
                    @php
                        $item_ids = App\Models\Item::pluck('_id');
                    @endphp
                    <table class="table table-bordered" id="user-table">
                        <thead>
                            <tr>
                                <th scope="col">Site Name</th>
                                @foreach ($items as $item)
                                    <th scope="col">{{$item}}</th>
                                @endforeach
                        </thead>
                        <tbody>
                            @foreach ($sites as $site)
                            <tr>
                                <td>{{$site->name }}</td>
                                @foreach ($item_ids as $item_id)
                                <td>
                                    {{$site->inventories()->where('item_id', $item_id)->first() ? $site->inventories()->where('item_id', $item_id)->first()->stock : 0}}
                                </td>
                                @endforeach
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