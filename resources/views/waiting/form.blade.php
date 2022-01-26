@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="form-group">
    <label for="">Site</label>
    <select name="site_id" class="select select2 form-control" id="siteType">
        <option value="{{null}}" selected="selected">Select Options</option>
        @if(Auth::user()->type == "agent")
            @foreach (Auth::user()->sites as $site)
                <option data-user="{{$site->type}}" value="{{$site->_id}}" @if( (isset($wt->site_id)) || (old('site_id')) )selected="selected" @endif>
                    {{$site->name}}
                </option>
            @endforeach
        @else
            @foreach ($sites as $site)
                <option data-user="{{$site->type}}" value="{{$site->id}}" @if( (isset($wt->site_id)) || (old('site_id')) )selected="selected" @endif > {{$site->name}} </option>
            @endforeach
        @endif
    </select>
</div>

<div class="form-group">
    <label for="">Average Waiting Time<span style="font-size: 70%"> (In Minutes)</span></label>
    <input type="number" min=0 class="form-control" name="waiting_time" value="{{ old('waiting_time') }}" >
</div>

<div class="form-group">
    <label for="">Total number of customers </label>
    <input type="number" min=0 class="form-control" name="no_customer" value="{{ old('no_customer') }}" >
</div>

<div class="form-group">
    <label for="">Total number of clinicians  </label>
    <input type="number" min=0 class="form-control" name="no_clinics" value="{{ old('no_clinics') }}" >
</div>

<div class="form-group">
    <label for="">Total working hours </label>
    <input type="number" min=0 class="form-control" name="working_hours" value="{{ old('working_hours') }}" >
</div>

<div class="form-group" id="wt-codeRed">
    <label for="">Data entry to the system </label>
    <select name="data_entry" class="form-control select2">
        <option value="{{null}}" selected="selected">Select Options</option>
        <option value="Yes" @if( (isset($wt) && $wt->data_entry == "Yes") || old('Yes') == "Yes" ) selected="selected" @endif>Yes</option>
        <option value="No" @if( (isset($wt) && $wt->data_entry == "No") || old('No') == "No" ) selected="selected" @endif>No</option>
    </select>
</div>

<button type="submit" class="btn btn-primary mr-2">Submit</button>
