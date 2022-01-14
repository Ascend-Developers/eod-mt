
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
        @foreach (Auth::user()->getSites() as $site)
            <option value="{{$site->_id}}" @if(isset($site->region) && $site->_id == $site->region_id) value="{{$site->region_id}}" selected="selected" @endif>
                {{$site->name}}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="">Number of Staff</label>
    <input type="number" class="form-control" name="no_of_staff"  >
</div>

<div class="form-group">
    <label for="">No of Absence Staff</label>
    <input type="number" class="form-control" name="no_of_absence" >
</div>

<div class="form-group">
    <label for="">No of achieved Results</label>
    <input type="number" class="form-control" name="no_of_results" >
</div>

<div class="form-group">
    <label for="">No of re-runs</label>
    <input type="number" class="form-control" name="no_of_rerun" >
</div>

<div class="form-group">
    <label for="">No of equipments down</label>
    <input type="number" class="form-control" name="no_of_equipment_down" >
</div>

<div class="form-group">
    <label for="">Total No of swabs received in package</label>
    <input type="number" class="form-control" name="no_of_swabs_received" >
</div>

<div class="form-group">
    <label for="">Total No of swabs mentioned in PTU</label>
    <input type="number" class="form-control" name="no_of_swabs_ptu" >
</div>
