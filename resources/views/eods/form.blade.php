
<div class="form-group">
    <label for="">Site</label>
    <select name="site_id" class="form-control form-control-lg select2"  id="exampleSelectl2">
        <option value="{{null}}" selected="selected">Select Options</option>
        @foreach ($sites as $site)
            <option value="{{$site->_id}}" >
                {{$site->name}}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="">Select Item</label>
    <select name="item_id" class="form-control form-control-lg select2"  id="exampleSelectl1">
        <option value="{{null}}" selected="selected">Select Options</option>
        @foreach ($items as $region)
            <option value="{{$region->_id}}" @if(isset($site->region) && $region->_id == $site->region_id) value="{{$site->region_id}}" selected="selected" @endif>
                {{$region->name}}
            </option>
        @endforeach
    </select>
</div>


<div class="form-group">
    <label for="">Start of day stock</label>
    <input type="number" class="form-control" name="startOfDayStock">
</div>

<div class="form-group">
    <label for="">Number of Tests</label>
    <input type="number" class="form-control" name="test">
</div>


<div class="form-group">
    <label for="">New Stock Received</label>
    <input type="number" class="form-control" name="newStock">
</div>
