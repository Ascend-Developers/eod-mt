
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
    <select name="site_id" class="form-control form-control-lg select2"  id="site_id" required>
        <option value="{{null}}" selected="selected">Select Options</option>
        @if(Auth::user()->type == "agent")
            @foreach (Auth::user()->sites as $site)
                <option value="{{$site->_id}}" >
                    {{$site->name}}
                </option>
            @endforeach
        @else
            @foreach ($sites as $site)
                <option value="{{$site->_id}}" >
                    {{$site->name}}
                </option>
            @endforeach
        @endif
    </select>
</div>

<div class="form-group">
    <label for="">Select Item</label>
    <select name="item_id" class="form-control form-control-lg select2"  id="item_id" required>
        <option value="{{null}}" selected="selected">Select Options</option>
        @foreach ($items as $region)
            <option value="{{$region->_id}}" @if(isset($site->region) && $region->_id == $site->region_id) value="{{$site->region_id}}" selected="selected" @endif>
                {{$region->name}}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="">Select Shift</label>
    <select name="shift" class="form-control form-control-lg select2"  id="shift_id" required>
        <option value="{{null}}" selected="selected">Select Options</option>
        <option value="1" >1st</option>
        <option value="2" >2nd</option>
        <option value="3" >3rd</option>
    </select>
</div>

<div class="form-group">
    <label for="">Start of day stock</label>
    <input type="number" class="form-control" name="startOfDayStock" required readonly id="startOfStock">
</div>

<div class="form-group">
    <label for="">Number of Tests</label>
    <input type="number" class="form-control" name="test" required>
</div>


<div class="form-group">
    <label for="">New Stock Received</label>
    <input type="number" class="form-control" name="newStock" required>
</div>

