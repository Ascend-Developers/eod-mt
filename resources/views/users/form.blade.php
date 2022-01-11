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
    <label for="">Name</label>
    <input type="text" class="form-control" name="name" @if(isset($users)) value="{{$users->name}}" @else value="{{ old('name') }}" @endif>
</div>
<div class="form-group">
    <label for="">Email</label>
    <input type="text" class="form-control" name="email" @if(isset($users)) value="{{$users->email}}" @else value="{{ old('email') }}" @endif>
</div>
<div class="form-group">
    <label for="">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Enter Password">
</div>
<div class="form-group">
    <label for="">Select Type</label>
    <select name="type" id="user-type" class="form-control select2">
        <option value="{{null}}" selected="selected">Select Options</option>
        <option value="agent" @if( (isset($users) && $users->type == "agent") || old('type') == "agent" ) selected="selected" @endif>Agent</option>
        <option value="region_head" @if( (isset($users) && $users->type == "region_head") || old('region_head') == "region_head" ) selected="selected" @endif>Region Head</option>
        <option value="sector_head" @if( (isset($users) && $users->type == "sector_head") || old('sector_head') == "sector_head" ) selected="selected" @endif>Sector Head</option>
        <option value="admin" @if( (isset($users) && $users->type == "admin") || old('type') == "admin" ) selected="selected" @endif>Admin</option>
        @if(auth()->user()->type === "super_admin")
        <option value="super_admin" @if( (isset($users) && $users->type == "super_admin") || old('type') == "super_admin" ) selected="selected" @endif>Super Admin</option>
        @endif
    </select>
</div>
<div class="form-group" id="user-sertor">
    <label for="">Sector</label>
    <select name="sector" class="form-control select2">
        <option value="{{null}}" selected="selected">Select Options</option>
        <option value="MOH" @if( (isset($users) && $users->sector == "MOH") || old('MOH') == "MOH" ) selected="selected" @endif>MOH</option>
        <option value="NON-MOH" @if( (isset($users) && $users->sector == "NON-MOH") || old('NON-MOH') == "NON-MOH" ) selected="selected" @endif>NON-MOH</option>
        <option value="Private" @if( (isset($users) && $users->sector == "Private") || old('Private') == "Private" ) selected="selected" @endif>Private</option>
    </select>
</div>
<div class="form-group">
    <label for="">Phone No</label>
    <input type="text" class="form-control" name="phone" @if(isset($users)) value="{{$users->phone}}" @else value="{{ old('phone') }}" @endif>
</div>
<div class="form-group" id="user-sertor">
    <label for="">Data Validator</label>
    <select name="dataValidator" class="form-control select2">
        <option value="{{null}}" selected="selected">Select Options</option>
        <option value="Data" @if( (isset($users) && $users->dataValidator == "Data") || old('Data') == "Data" ) selected="selected" @endif>Data</option>
        <option value="Quality" @if( (isset($users) && $users->dataValidator == "Quality") || old('Quality') == "Quality" ) selected="selected" @endif>Quality</option>
        <option value="Supply-Chain" @if( (isset($users) && $users->dataValidator == "Supply-Chain") || old('Supply-Chain') == "Supply-Chain" ) selected="selected" @endif>Supply-Chain</option>
        <option value="Regional-PMO" @if( (isset($users) && $users->dataValidator == "Regional-PMO") || old('Regional-PMO') == "Regional-PMO" ) selected="selected" @endif>Regional-PMO</option>
    </select>
</div>
<div class="form-group">
    <label for="">Vaccine Site</label>
    <select name="site_id" class="form-control select2">
        <option value="{{Null}}">Select Option</option>
        @foreach($vaccineSites as $vaccineSite)
        <option value="{{$vaccineSite->id}}" @if( (isset($users->site_id) && $vaccineSite->id == $users->site_id) ) selected="selected" @endif > {{$vaccineSite->name}} {{$vaccineSite->region ? $vaccineSite->region->name : "--"}} </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="">Select Region If User is Regional Head</label>
    <select name="region_ids[]" class="form-control select2" multiple>
        <option value="{{Null}}">Select Option</option>
        @foreach($regions as $region)
        <option value="{{$region->id}}" @if( (isset($users->region_ids) && in_array($region->id, $users->region_ids)) ) selected="selected" @endif > {{$region->name}} </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="">Modules</label>
    <select name="modules_ids[]" class="select2 select2" multiple="multiple" id="large-select-multi">
        @foreach($modules as $module)
        <option value="{{$module->id}}" @if( (isset($users->modules_id) && in_array($module->id,$users->modules_id) ) || (old('modules_id') && in_array($module->id, old('modules_id')) ) )selected="selected" @endif > {{$module->name}} </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <div class="custom-control custom-control-primary custom-switch">
        <p class="mb-50">PMO (For Regional Head)</p>
        <input name="pmo" type="checkbox" @if(isset($users) && $users->pmo == true) checked @endif class="custom-control-input" id="customSwitch4" />
        <label class="custom-control-label" for="customSwitch4"></label>
    </div>
</div>
@if(Auth::user()->email == "admin@ascend.com.sa" || Auth::user()->email == "hassan.aamir@ascend.com.sa" || Auth::user()->email == "khadija.yasin@ascend.com.sa")
<div class="form-group">
    <label for="">Password Updated</label>
    <select name="isPasswordUpdated" class="form-control">
        <option value="true" @if( (isset($users->isPasswordUpdated) && $users->isPasswordUpdated == 'true') ) selected="selected" @endif>True</option>
        <option value="false" @if( (isset($users->isPasswordUpdated) && $users->isPasswordUpdated == 'false')) ) selected="selected" @endif>False</option>
    </select>
</div>
@endif

<button type="submit" class="btn btn-primary mr-2">Submit</button>