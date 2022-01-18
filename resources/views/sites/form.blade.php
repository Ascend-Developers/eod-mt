<div class="form-group">
    <label for="">Name</label>
    <input type="text" class="form-control" name="name"  @if(isset($site)) value="{{$site->name}}" @endif>
</div>

<div class="form-group">
    <label for="">Region</label>
    <select name="region_id" class="form-control form-control-lg select2"  id="exampleSelectl2">
        <option value="{{null}}" selected="selected">Select Options</option>
        @foreach ($regions as $region)
            <option value="{{$region->_id}}" @if(isset($site->region) && $region->_id == $site->region_id) value="{{$site->region_id}}" selected="selected" @endif>
                {{$region->name}}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="">Site Type</label>
    <select name="siteType" class="form-control form-control-lg select2"  id="exampleSelectl2">
        <option value="{{null}}" selected="selected">Select Options</option>
        <option value="Lab" @if(isset($site->siteType)) value="{{$site->siteType}}" selected="selected" @endif>Lab</option>
        <option value="Covid Test Center" @if(isset($site->siteType)) value="{{$site->siteType}}" selected="selected" @endif>Covid Test Center</option>
    </select>
</div>

<div class="form-group">
    <div class="custom-control custom-control-success custom-switch">
        <p class="mb-50">Major Site</p>
        <input name="type" type="checkbox" @if(isset($site) && $site->type == 'mega') checked @endif class="custom-control-input" id="customSwitch5" />
        <label class="custom-control-label" for="customSwitch5"></label>
    </div>
</div>
