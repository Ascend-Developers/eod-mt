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

<div class="form-group" id="user-sertor">
    <label for="">Code Red status</label>
    <select name="codeRedStatus" class="form-control select2">
        <option value="{{null}}" selected="selected">Select Options</option>
        <option value="Yes" @if( (isset($wt) && $wt->codeRedStatus == "Yes") || old('Yes') == "Yes" ) selected="selected" @endif>Yes</option>
        <option value="No" @if( (isset($wt) && $wt->codeRedStatus == "No") || old('No') == "No" ) selected="selected" @endif>No</option>
    </select>
</div>

<div class="form-group" id="user-sertor">
    <label for="">Operator supervisor on site</label>
    <select name="operatorSupervisorOnSite" class="form-control select2">
        <option value="{{null}}" selected="selected">Select Options</option>
        <option value="Yes" @if( (isset($wt) && $wt->operatorSupervisorOnSite == "Yes") || old('Yes') == "Yes" ) selected="selected" @endif>Yes</option>
        <option value="No" @if( (isset($wt) && $wt->operatorSupervisorOnSite == "No") || old('No') == "No" ) selected="selected" @endif>No</option>
    </select>
</div>

<div class="form-group" id="user-sertor">
    <label for="">Double clinical resources per cabin</label>
    <select name="doubleClinicalResourcesPerCabin" class="form-control select2">
        <option value="{{null}}" selected="selected">Select Options</option>
        <option value="Yes" @if( (isset($wt) && $wt->doubleClinicalResourcesPerCabin == "Yes") || old('Yes') == "Yes" ) selected="selected" @endif>Yes</option>
        <option value="No" @if( (isset($wt) && $wt->doubleClinicalResourcesPerCabin == "No") || old('No') == "No" ) selected="selected" @endif>No</option>
    </select>
</div>

<div class="form-group" id="user-sertor">
    <label for="">Home kits available on site</label>
    <select name="homeKitsAvailableOnSite" class="form-control select2">
        <option value="{{null}}" selected="selected">Select Options</option>
        <option value="Yes" @if( (isset($wt) && $wt->homeKitsAvailableOnSite == "Yes") || old('Yes') == "Yes" ) selected="selected" @endif>Yes</option>
        <option value="No" @if( (isset($wt) && $wt->homeKitsAvailableOnSite == "No") || old('No') == "No" ) selected="selected" @endif>No</option>
    </select>
</div>

<div class="form-group" id="user-sertor">
    <label for="">Home kits in use in the last hour</label>
    <select name="homeKitsInUseInTheLastHour" class="form-control select2">
        <option value="{{null}}" selected="selected">Select Options</option>
        <option value="Yes" @if( (isset($wt) && $wt->homeKitsInUseInTheLastHour == "Yes") || old('Yes') == "Yes" ) selected="selected" @endif>Yes</option>
        <option value="No" @if( (isset($wt) && $wt->homeKitsInUseInTheLastHour == "No") || old('No') == "No" ) selected="selected" @endif>No</option>
    </select>
</div>

<div class="form-group" id="user-sertor">
    <label for="">Number of lanes closed</label>
    <select name="numberOfLanesClosed" class="form-control select2">
        <option value="{{null}}" selected="selected">Select Options</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
    </select>
</div>

<div class="form-group" id="user-sertor">
    <label for="">Code Red status and Shurta Al Murour present</label>
    <select name="codeRedStatusAndShurtaAlMurourPresent" class="form-control select2">
        <option value="{{null}}" selected="selected">Select Options</option>
        <option value="Yes" @if( (isset($wt) && $wt->codeRedStatusAndShurtaAlMurourPresent == "Yes") || old('Yes') == "Yes" ) selected="selected" @endif>Yes</option>
        <option value="No" @if( (isset($wt) && $wt->codeRedStatusAndShurtaAlMurourPresent == "No") || old('No') == "No" ) selected="selected" @endif>No</option>
    </select>
</div>

<div class="form-group" id="user-sertor">
    <label for="">PCR sample collection frequency as scheduled</label>
    <select name="PCRSampleCollectionFrequencyAsScheduled" class="form-control select2">
        <option value="{{null}}" selected="selected">Select Options</option>
        <option value="Yes" @if( (isset($wt) && $wt->PCRSampleCollectionFrequencyAsScheduled == "Yes") || old('Yes') == "Yes" ) selected="selected" @endif>Yes</option>
        <option value="No" @if( (isset($wt) && $wt->PCRSampleCollectionFrequencyAsScheduled == "No") || old('No') == "No" ) selected="selected" @endif>No</option>
    </select>
</div>

<div class="form-group" id="user-sertor">
    <label for="">ART sample to taken kitchen continuously</label>
    <select name="ARTSampleToTakenKitchenContinuously" class="form-control select2">
        <option value="{{null}}" selected="selected">Select Options</option>
        <option value="Yes" @if( (isset($wt) && $wt->ARTSampleToTakenKitchenContinuously == "Yes") || old('Yes') == "Yes" ) selected="selected" @endif>Yes</option>
        <option value="No" @if( (isset($wt) && $wt->ARTSampleToTakenKitchenContinuously == "No") || old('No') == "No" ) selected="selected" @endif>No</option>
    </select>
</div>

<div class="form-group" id="user-sertor">
    <label for="">On site stocks for PCR, ART sufficient for day</label>
    <select name="onSiteStocksForPCR_ARTSufficientForDay" class="form-control select2">
        <option value="{{null}}" selected="selected">Select Options</option>
        <option value="Yes" @if( (isset($wt) && $wt->onSiteStocksForPCR_ARTSufficientForDay == "Yes") || old('Yes') == "Yes" ) selected="selected" @endif>Yes</option>
        <option value="No" @if( (isset($wt) && $wt->onSiteStocksForPCR_ARTSufficientForDay == "No") || old('No') == "No" ) selected="selected" @endif>No</option>
    </select>
</div>

<div class="form-group" id="user-sertor">
    <label for="">Hippa Filter on site in ART kitchen</label>
    <select name="HippaFilterOnSiteInARTKitchen" class="form-control select2">
        <option value="{{null}}" selected="selected">Select Options</option>
        <option value="Yes" @if( (isset($wt) && $wt->HippaFilterOnSiteInARTKitchen == "Yes") || old('Yes') == "Yes" ) selected="selected" @endif>Yes</option>
        <option value="No" @if( (isset($wt) && $wt->HippaFilterOnSiteInARTKitchen == "No") || old('No') == "No" ) selected="selected" @endif>No</option>
    </select>
</div>

<div class="form-group" id="user-sertor">
    <label for="">Data is being entered as per training</label>
    <select name="dataIsBeingEnteredAsPerTraining" class="form-control select2">
        <option value="{{null}}" selected="selected">Select Options</option>
        <option value="Yes" @if( (isset($wt) && $wt->dataIsBeingEnteredAsPerTraining == "Yes") || old('Yes') == "Yes" ) selected="selected" @endif>Yes</option>
        <option value="No" @if( (isset($wt) && $wt->dataIsBeingEnteredAsPerTraining == "No") || old('No') == "No" ) selected="selected" @endif>No</option>
    </select>
</div>

<div class="form-group" id="user-sertor">
    <label for="">Shift to shift handover as per operator SLA</label>
    <span style="font-size: 70%"> (Staggered with 50% of cabins swapping at any time and no more than 15 mins handover)</span>
    <select name="shiftToShiftHandoverAsPerOperatorSLA" class="form-control select2">
        <option value="{{null}}" selected="selected">Select Options</option>
        <option value="Yes" @if( (isset($wt) && $wt->shiftToShiftHandoverAsPerOperatorSLA == "Yes") || old('Yes') == "Yes" ) selected="selected" @endif>Yes</option>
        <option value="No" @if( (isset($wt) && $wt->shiftToShiftHandoverAsPerOperatorSLA == "No") || old('No') == "No" ) selected="selected" @endif>No</option>
    </select>
</div>

<div class="form-group" id="user-sertor">
    <label for="">Mode of Operations</label>
    <select name="modeOfOperations" class="form-control select2">
        <option value="{{null}}" selected="selected">Select Options</option>
        <option value="ART" @if( (isset($wt) && $wt->modeOfOperations == "ART") || old('ART') == "ART" ) selected="selected" @endif>ART</option>
        <option value="PCR" @if( (isset($wt) && $wt->modeOfOperations == "PCR") || old('PCR') == "PCR" ) selected="selected" @endif>PCR</option>
        <option value="Both" @if( (isset($wt) && $wt->modeOfOperations == "Both") || old('Both') == "Both" ) selected="selected" @endif>Both</option>
    </select>
</div>

<div class="form-group">
    <label for="">Top 3 issues by site</label>
    <textarea class="form-control" name="details"></textarea>
</div>

<button type="submit" class="btn btn-primary mr-2">Submit</button>
