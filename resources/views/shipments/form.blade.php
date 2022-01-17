
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
    <label for="">Time of Shipment</label>
    <input type="text" class="form-control flat" name="shipment_time"  @if(isset($site)) value="{{$site->name}}" @endif>
</div>

<div class="form-group">
    <label for="">Site</label>
    <select name="site_id" class="form-control form-control-lg select2"  id="site_id" required>
        <option value="{{null}}" selected="selected">Select Options</option>
        @foreach (Auth::user()->getSites() as $site)
            <option value="{{$site->_id}}" @if(isset($site->region) && $site->_id == $site->region_id) value="{{$site->region_id}}" selected="selected" @endif>
                {{$site->name}}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="">Number of Swabs in Package</label>
    <input type="number" class="form-control" name="no_swabs_in_package"  >
</div>

<div class="form-group">
    <label for="">Number of Swabs in PTU</label>
    <input type="number" class="form-control" name="no_swabs_in_ptu" >
</div>


<div class="form-group mb-5">
    <div class="custom-control custom-control-success custom-switch">
        <p class="mb-50">Shipment was on time ?</p>
        <input name="on_schedule" type="checkbox" @if(isset($shipment) && $site->on_schedule == true) checked @endif class="custom-control-input" id="customSwitch5" />
        <label class="custom-control-label" for="customSwitch5"></label>
    </div>
</div>
