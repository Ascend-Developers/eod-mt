@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<h3>Wating Time</h3>

<div class="form-group">
    <label for="">Site</label>
    <select name="site_id" class="select2 select2" id="large-select-multi">
        <option value="{{null}}" selected="selected">Select Options</option>
        @if(Auth::user()->type == "agent")
            @foreach (Auth::user()->sites as $site)
                <option value="{{$site->_id}}" @if( (isset($wt->site_id)) || (old('site_id')) )selected="selected" @endif>
                    {{$site->name}}
                </option>
            @endforeach
        @else
            @foreach ($sites as $site)
                <option value="{{$site->id}}" @if( (isset($wt->site_id)) || (old('site_id')) )selected="selected" @endif > {{$site->name}} </option>
            @endforeach
        @endif
    </select>
</div>

<div class="form-group">
    <label for="">T1<span style="font-size: 70%"> (Arrival to cabin)</span></label>
    <input type="number" min=0 class="form-control" name="t1" @if(isset($wt)) value="{{$wt->t1}}" @else value="{{ old('t1') }}" @endif>
</div>

<div class="form-group">
    <label for="">T2<span style="font-size: 70%"> (At cabin)</span></label>
    <input type="number" min=0 class="form-control" name="t2" @if(isset($wt)) value="{{$wt->t2}}" @else value="{{ old('t2') }}" @endif>
</div>

<h3>Operation Excellence</h3>

<div class="form-group">
    <label for="">Number Of Resources Per Cabinet</label>
    <input type="number" min="0" class="form-control" name="numberOfResourcesPerCabinet" @if(isset($wt)) value="{{$wt->numberOfResourcesPerCabinet}}" @else value="{{ old('numberOfResourcesPerCabinet') }}" @endif>
</div>

<div class="form-group">
    <label for="">Total Number Of Cabinets</label>
    <input type="number" min="0" class="form-control" name="totalNumberOfCabinets" @if(isset($wt)) value="{{$wt->totalNumberOfCabinets}}" @else value="{{ old('totalNumberOfCabinets') }}" @endif>
</div>

<div class="form-group">
    <label for="">Out of the total number, How Many Open</label>
    <input type="number" min="0" class="form-control" name="howManyOpen" @if(isset($wt)) value="{{$wt->howManyOpen}}" @else value="{{ old('howManyOpen') }}" @endif>
</div>

<div class="form-group">
    <label for="">Out of the total number, How Many Closed</label>
    <input type="number" min="0" class="form-control" name="howManyClosed" @if(isset($wt)) value="{{$wt->howManyClosed}}" @else value="{{ old('howManyClosed') }}" @endif>
</div>

<div class="form-group" id="user-sertor">
    <label for="">Shift To Shift Compliance</label>
    <select name="shiftToShiftCompliance" class="form-control select2">
        <option value="{{null}}" selected="selected">Select Options</option>
        <option value="Red" @if( (isset($wt) && $wt->shiftToShiftCompliance == "Red") || old('Red') == "Red" ) selected="selected" @endif>Red (more than 10 mints)</option>
        <option value="Yellow" @if( (isset($wt) && $wt->shiftToShiftCompliance == "Yellow") || old('Yellow') == "Yellow" ) selected="selected" @endif>Yellow (5 to 10 mints)</option>
        <option value="Green " @if( (isset($wt) && $wt->shiftToShiftCompliance == "Green ") || old('Green ') == "Green " ) selected="selected" @endif>Green (0 to 5 mints)</option>
    </select>
</div>

<div class="form-group" id="user-sertor">
    <label for="">Shift Supervisor On Duty</label>
    <select name="shiftSupervisorOnDuty" class="form-control select2">
        <option value="{{null}}" selected="selected">Select Options</option>
        <option value="Yes" @if( (isset($wt) && $wt->shiftSupervisorOnDuty == "Yes") || old('Yes') == "Yes" ) selected="selected" @endif>Yes</option>
        <option value="No" @if( (isset($wt) && $wt->shiftSupervisorOnDuty == "No") || old('No') == "No" ) selected="selected" @endif>No</option>
    </select>
</div>

<h3>Code Red Protocol</h3>

<div class="form-group" id="user-sertor">
    <label for="">Strong Triage</label>
    <select name="strongTriage" class="form-control select2">
        <option value="{{null}}" selected="selected">Select Options</option>
        <option value="Yes" @if( (isset($wt) && $wt->strongTriage == "Yes") || old('Yes') == "Yes" ) selected="selected" @endif>Yes</option>
        <option value="No" @if( (isset($wt) && $wt->strongTriage == "No") || old('No') == "No" ) selected="selected" @endif>No</option>
    </select>
</div>

<div class="form-group" id="user-sertor">
    <label for="">Home Kit Distribution</label>
    <select name="homeKitDistribution" class="form-control select2">
        <option value="{{null}}" selected="selected">Select Options</option>
        <option value="Yes" @if( (isset($wt) && $wt->homeKitDistribution == "Yes") || old('Yes') == "Yes" ) selected="selected" @endif>Yes</option>
        <option value="No" @if( (isset($wt) && $wt->homeKitDistribution == "No") || old('No') == "No" ) selected="selected" @endif>No</option>
    </select>
</div>

<h3>RT Kitchen</h3>

<div class="form-group" id="user-sertor">
    <label for="">Medical HIPPA Filter</label>
    <select name="medicalHippaFilter" class="form-control select2">
        <option value="{{null}}" selected="selected">Select Options</option>
        <option value="Yes" @if( (isset($wt) && $wt->medicalHippaFilter == "Yes") || old('Yes') == "Yes" ) selected="selected" @endif>Yes</option>
        <option value="No" @if( (isset($wt) && $wt->medicalHippaFilter == "No") || old('No') == "No" ) selected="selected" @endif>No</option>
    </select>
</div>

<div class="form-group" id="user-sertor">
    <label for="">Rapid Test Data Entry</label>
    <select name="rapidTestDataEntry" class="form-control select2">
        <option value="{{null}}" selected="selected">Select Options</option>
        <option value="Red" @if( (isset($wt) && $wt->rapidTestDataEntry == "Red") || old('Red') == "Red" ) selected="selected" @endif>Red (More Than 6 Hours)</option>
        <option value="Yellow" @if( (isset($wt) && $wt->rapidTestDataEntry == "Yellow") || old('Yellow') == "Yellow" ) selected="selected" @endif>Yellow (4 Hours)</option>
        <option value="Green " @if( (isset($wt) && $wt->rapidTestDataEntry == "Green ") || old('Green ') == "Green " ) selected="selected" @endif>Green (2 Hours)</option>
    </select>
</div>

<h3>Others</h3>

<div class="form-group" id="user-sertor">
    <label for="">Supplies For 6 Day</label>
    <select name="suppliesFor6Day" class="form-control select2">
        <option value="{{null}}" selected="selected">Select Options</option>
        <option value="Yes" @if( (isset($wt) && $wt->suppliesFor6Day == "Yes") || old('Yes') == "Yes" ) selected="selected" @endif>Yes</option>
        <option value="No" @if( (isset($wt) && $wt->suppliesFor6Day == "No") || old('No') == "No" ) selected="selected" @endif>No</option>
    </select>
</div>

<div class="form-group" id="user-sertor">
    <label for="">PCR Sample Collection Frequency</label>
    <select name="PCRSampleCollectionFrequency" class="form-control select2">
        <option value="{{null}}" selected="selected">Select Options</option>
        <option value="Yes" @if( (isset($wt) && $wt->PCRSampleCollectionFrequency == "Yes") || old('Yes') == "Yes" ) selected="selected" @endif>Yes</option>
        <option value="No" @if( (isset($wt) && $wt->PCRSampleCollectionFrequency == "No") || old('No') == "No" ) selected="selected" @endif>No</option>
    </select>
</div>

<button type="submit" class="btn btn-primary mr-2">Submit</button>