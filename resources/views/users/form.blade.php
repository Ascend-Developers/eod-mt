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
    <label for="">Roles</label>
    <select name="type" id="user-type" class="form-control select2">
        <option value="{{null}}" selected="selected">Select Options</option>
        <option value="agent" @if( (isset($users) && $users->type == "agent") || old('type') == "agent" ) selected="selected" @endif>Agent</option>
        <option value="admin" @if( (isset($users) && $users->type == "admin") || old('type') == "admin" ) selected="selected" @endif>Admin</option>
    </select>
</div>
<div class="form-group" id="user-sertor">
    <label for="">Category</label>
    <select name="category" class="form-control select2">
        <option value="{{null}}" selected="selected">Select Options</option>
        <option value="PMO" @if( (isset($users) && $users->category == "PMO") || old('PMO') == "PMO" ) selected="selected" @endif>PMO</option>
        <option value="Operational" @if( (isset($users) && $users->category == "Operational") || old('Operational') == "Operational" ) selected="selected" @endif>Operational</option>
    </select>
</div>
<div class="form-group">
    <label for="">Phone No</label>
    <input type="text" class="form-control" name="phone" @if(isset($users)) value="{{$users->phone}}" @else value="{{ old('phone') }}" @endif>
</div>

{{-- <div class="form-group">
    <label for="">Modules</label>
    <select name="modules_ids[]" class="select2 select2" multiple="multiple" id="large-select-multi">
        @foreach($modules as $module)
        <option value="{{$module->id}}" @if( (isset($users->modules_id) && in_array($module->id,$users->modules_id) ) || (old('modules_id') && in_array($module->id, old('modules_id')) ) )selected="selected" @endif > {{$module->name}} </option>
        @endforeach
    </select>
</div> --}}

<button type="submit" class="btn btn-primary mr-2">Submit</button>