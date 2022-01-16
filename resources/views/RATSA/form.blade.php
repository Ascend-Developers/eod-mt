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

<div class="form-group" id="user-sertor">
    <label for="">Cabin Number <strong style="font-size: 85%"> (Initial audit should be of all cabins, there after 3 cabinets. Tickets should be raised where quality problems are found)</strong></label>
    <select name="cabinNo" class="form-control select2">
        <option value="{{null}}" selected="selected">Select Options</option>
        <option value="1">1 Cabin</option>
        <option value="2">2 Cabin</option>
        <option value="3">3 Cabin</option>
        <option value="4">4 Cabin</option>
        <option value="5">5 Cabin</option>
        <option value="6">6 Cabin</option>
        <option value="7">7 Cabin</option>
        <option value="8">8 Cabin</option>
        <option value="9">9 Cabin</option>
        <option value="10">10 Cabin</option>
        <option value="11">11 Cabin</option>
        <option value="12">12 Cabin</option>
        <option value="13">13 Cabin</option>
        <option value="14">14 Cabin</option>
        <option value="15">15 Cabin</option>
        <option value="16">16 Cabin</option>
        <option value="17">17 Cabin</option>
        <option value="18">18 Cabin</option>
    </select>
</div>

<div class="form-group" id="user-sertor">
    <label for="">Training sample withdrawl <strong style="font-size: 85%"> (Every new operative must be licenced by the Saudi Health Commission for Health to conduct sample withdrawal)</strong></label>
    <select name="trainingSampleWithdrawal" class="form-control select2">
        <option value="{{null}}" selected="selected">Select Options</option>
        <option value="3">3 (All staff comply)</option>
        <option value="2">2 (Majority staff comply)</option>
        <option value="1">1 (Minority of staff comply)</option>
    </select>
</div>

<div class="form-group" id="user-sertor">
    <label for="">Training RAT use <strong style="font-size: 85%"> (Staff have undergone official training and can demonstrate in front a site clinical supervisor the proper use of the rapid antigen test kit)</strong></label>
    <select name="trainingRATUse" class="form-control select2">
        <option value="{{null}}" selected="selected">Select Options</option>
        <option value="3">3 (All staff comply)</option>
        <option value="2">2 (Majority staff comply)</option>
        <option value="1">1 (Minority of staff comply)</option>
    </select>
</div>

<div class="form-group" id="user-sertor">
    <label for="">Training in use of HESN+</label>
    <select name="trainingInUseOfESN" class="form-control select2">
        <option value="{{null}}" selected="selected">Select Options</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
</div>

<div class="form-group" id="user-sertor">
    <label for="">Rapid Antigen Test Batch Check <strong style="font-size: 85%"> (A sample kit should be tested using the positive control for each new: (i:Box ii:Shipment iii:Lot number) Results logged, tickets are raised in the case of variances)</strong></label>
    <select name="rapidAntigenTestBatchCheck" class="form-control select2">
        <option value="{{null}}" selected="selected">Select Options</option>
        <option value="1">1 (Urgent Improvement)</option>
        <option value="2">2 (Improvement)</option>
        <option value="3">3 (Adequate)</option>
        <option value="4">4 (Good)</option>
        <option value="5">5 (Exemplary)</option>
    </select>
</div>

<div class="form-group" id="user-sertor">
    <label for="">Correct swab and cassette labeling <strong style="font-size: 85%"> (The issued bar-code labels come in pairs, one should be affixed to the sample tube, the other label to the cassette to prevent any errors in resulting)</strong></label>
    <select name="correctSwabAndCassetteLabeling" class="form-control select2">
        <option value="{{null}}" selected="selected">Select Options</option>
        <option value="1">1 (Urgent Improvement)</option>
        <option value="2">2 (Improvement)</option>
        <option value="3">3 (Adequate)</option>
        <option value="4">4 (Good)</option>
        <option value="5">5 (Exemplary)</option>
    </select>
</div>

<div class="form-group" id="user-sertor">
    <label for="">Infection Control / PPE <strong style="font-size: 85%"> (Check: No food, Water safe store, added benches and shelves, spillage disinfected, end of shift disinfection,admin staff wear protective gloves, gloves decontaminated after each tray of cassettes is completed. posters correct PPE and Test Use)</strong></label>
    <select name="infectionControl_PPE" class="form-control select2">
        <option value="{{null}}" selected="selected">Select Options</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
</div>

<div class="form-group" id="user-sertor">
    <label for="">Waste Disposal <strong style="font-size: 85%"> (Each clinic room large capacity non-clinical waste bin. Each large capacity clinical waste bin. Waste is managed)</strong></label>
    <select name="wasteDisposal" class="form-control select2">
        <option value="{{null}}" selected="selected">Select Options</option>
        <option value="1">1 (Urgent Improvement)</option>
        <option value="2">2 (Improvement)</option>
        <option value="3">3 (Adequate)</option>
        <option value="4">4 (Good)</option>
        <option value="5">5 (Exemplary)</option>
    </select>
</div>

<div class="form-group" id="user-sertor">
    <label for="">Preparation of extraction tubes <strong style="font-size: 85%"> (The manufacturers instructions followed: Extraction tubes should not filled and left exposed, the level of liquid (exactly 12 drops, 300 ul), bubbles in the solution dissipated)</strong></label>
    <select name="preparationOfExtractionTubes" class="form-control select2">
        <option value="{{null}}" selected="selected">Select Options</option>
        <option value="1">1 (Urgent Improvement)</option>
        <option value="2">2 (Improvement)</option>
        <option value="3">3 (Adequate)</option>
        <option value="4">4 (Good)</option>
        <option value="5">5 (Exemplary)</option>
    </select>
</div>

<div class="form-group" id="user-sertor">
    <label for="">Non reacting cassettes <strong style="font-size: 85%"> (Staff ensure that the cassette is ‘reacting’ to the sample solution before discarding the solution)</strong></label>
    <select name="nonReactingCassettes" class="form-control select2">
        <option value="{{null}}" selected="selected">Select Options</option>
        <option value="1">1 (Urgent Improvement)</option>
        <option value="2">2 (Improvement)</option>
        <option value="3">3 (Adequate)</option>
        <option value="4">4 (Good)</option>
        <option value="5">5 (Exemplary)</option>
    </select>
</div>

<div class="form-group" id="user-sertor">
    <label for="">Health and Safety <strong style="font-size: 85%"> (Clinic rooms and admin rooms are being maintained regularly audited for damage. i.e. Doors should not be supported with fire extinguishers)</strong></label>
    <select name="healthAndSafety" class="form-control select2">
        <option value="{{null}}" selected="selected">Select Options</option>
        <option value="1">1 (Urgent Improvement)</option>
        <option value="2">2 (Improvement)</option>
        <option value="3">3 (Adequate)</option>
        <option value="4">4 (Good)</option>
        <option value="5">5 (Exemplary)</option>
    </select>
</div>

<div class="form-group" id="user-sertor">
    <label for="">Medical Hippa Filter in the kitchen</label>
    <select name="hippaFilter" class="form-control select2">
        <option value="{{null}}" selected="selected">Select Options</option>
        <option value="Yes" >Yes</option>
        <option value="No" >No</option>
    </select>
</div>

<div class="form-group" id="user-sertor">
    <label for="">Sufficient tablespace in the kitchen</label>
    <select name="tablespace" class="form-control select2">
        <option value="{{null}}" selected="selected">Select Options</option>
        <option value="Yes" >Yes</option>
        <option value="No" >No</option>
    </select>
</div>

<div class="form-group" id="user-sertor">
    <label for="">Infection control measure in place in kitchen</label>
    <select name="infection" class="form-control select2">
        <option value="{{null}}" selected="selected">Select Options</option>
        <option value="Yes" >Yes</option>
        <option value="No" >No</option>
    </select>
</div>

<button type="submit" class="btn btn-primary mr-2">Submit</button>
