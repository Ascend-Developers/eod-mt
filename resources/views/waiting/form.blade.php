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
    <label for="">T1</label>
    <input type="text" class="form-control" name="t1" @if(isset($wt)) value="{{$wt->t1}}" @else value="{{ old('t1') }}" @endif>
</div>

<div class="form-group">
    <label for="">T2</label>
    <input type="text" class="form-control" name="t2" @if(isset($wt)) value="{{$wt->t2}}" @else value="{{ old('t2') }}" @endif>
</div>

<div class="form-group">
    <label for="">Site</label>
    <select name="site_id" class="select2" id="large-select-multi">
        @foreach($sites as $site)
        <option value="{{$site->id}}" @if( (isset($wt->site_id)) || (old('site_id') && in_array($site->id, old('site_id')) ) )selected="selected" @endif > {{$site->name}} </option>
        @endforeach
    </select>
</div>

<button type="submit" class="btn btn-primary mr-2">Submit</button>