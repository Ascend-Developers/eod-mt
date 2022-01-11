<div class="form-group">
    <label for="">Name</label>
    <input type="text" class="form-control" name="name"  @if(isset($vaccineSites)) value="{{$vaccineSites->name}}" @endif>
</div>
<div class="form-group">
    <label for="">Name (Arabic)</label>
    <input type="text" class="form-control" name="name_ar"  @if(isset($vaccineSites)) value="{{$vaccineSites->name_ar}}" @endif>
</div>
<div class="form-group">
    <label for="">Region</label>
    <select name="region_id" class="form-control form-control-lg select2"  id="exampleSelectl2">
        <option value="{{null}}" selected="selected">Select Options</option>
        @foreach ($regions as $region)
            <option value="{{$region->_id}}" @if(isset($vaccineSites->region) && $region->_id == $vaccineSites->region_id) value="{{$vaccineSites->region_id}}" selected="selected" @endif>
                {{$region->name}}
            </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="">NVR Name</label>
    <select name="nvr_id" class="form-control form-control-lg select2"  id="exampleSelectl">
        @if(isset($vaccineSites->nvr))
            <option value="{{$vaccineSites->nvr_id}}" selected="selected">{{ $vaccineSites->nvr->name }} ({{ $vaccineSites->nvr->cc_id }})</option>
        @else
        <option value="{{null}}" selected="selected">Select Options</option>
        @endif
        <option value="NoName">No Name</option>
        @foreach ($nvr as $n)
            <option value="{{$n->_id}}" @if(isset($vaccineSites->nvr_id) && $n->_id == $vaccineSites->nvr_id) value="{{$vaccineSites->nvr_id}}" selected="selected" @endif>
                {{$n->name}}  ({{$n->cc_id}})
            </option>
        @endforeach

    </select>
</div>

<div class="form-group">
    <label for="">Vaccine Type</label>
    <select name="vaccineType" class="form-control form-control-lg select2"  id="exampleSelectl2">
        <option value="{{null}}" selected="selected">Select Options</option>
            <option value="Astra-Zeneca" @if(isset($vaccineSites) &&  $vaccineSites->vaccineType == "Astra-Zeneca") selected="selected" @endif>Astra-Zeneca</option>
            <option value="Pfizer" @if(isset($vaccineSites) &&  $vaccineSites->vaccineType == "Pfizer") selected="selected" @endif>Pfizer</option>
    </select>
</div>

<div class="form-group">
    <label for="fp-multiple">Temperary Off Days</label>
    <input type="text" id="fp-multiple" name="offDays" class="form-control flatpickr-multiple" placeholder="YYYY-MM-DD" />
</div>

<!-- <div class="form-group">
    <div class="custom-control custom-control-success custom-switch">
        <p class="mb-50">MOH</p>
        <input name="moh" type="checkbox" @if(isset($vaccineSites) && $vaccineSites->moh == true) checked @endif class="custom-control-input" id="customSwitch4" />
        <label class="custom-control-label" for="customSwitch4"></label>
    </div>
</div> -->

<div class="form-group">
    <label for="">Sector</label>
    <select name="moh" class="form-control form-control-lg select2"  id="exampleSelectl2">
        <option value="{{null}}" selected="selected">Select Options</option>
        <option value="MOH" @if(isset($vaccineSites) &&  $vaccineSites->moh == "MOH") selected="selected" @endif>MOH</option>
        <option value="NON-MOH" @if(isset($vaccineSites) &&  $vaccineSites->moh == "NON-MOH") selected="selected" @endif>NON-MOH</option>
        <option value="Private" @if(isset($vaccineSites) &&  $vaccineSites->moh == "Private") selected="selected" @endif>Private</option>
    </select>
</div>


<div class="form-group">
    <div class="custom-control custom-control-success custom-switch">
        <p class="mb-50">Active</p>
        <input name="active" type="checkbox" @if(isset($vaccineSites) && $vaccineSites->active == true) checked @endif class="custom-control-input" id="customSwitch1" />
        <label class="custom-control-label" for="customSwitch1"></label>
    </div>
</div>

<div class="form-group">
    <div class="custom-control custom-control-success custom-switch">
        <p class="mb-50">Premium</p>
        <input name="premium" type="checkbox" @if(isset($vaccineSites) && $vaccineSites->premium == true) checked @endif class="custom-control-input" id="customSwitch5" />
        <label class="custom-control-label" for="customSwitch5"></label>
    </div>
</div>
<div class="form-group">
    <div class="custom-control custom-control-success custom-switch">
        <p class="mb-50">Appointment</p>
        <input name="appointment" type="checkbox" @if(isset($vaccineSites) && $vaccineSites->appointment == 'Yes') checked @endif class="custom-control-input" id="customSwitch6" />
        <label class="custom-control-label" for="customSwitch6"></label>
    </div>
</div>
