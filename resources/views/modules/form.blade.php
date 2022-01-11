<div class="form-group">
    <label for="">Name</label>
    <input type="text" class="form-control" name="name"  @if(isset($module)) value="{{$module->name}}" @endif>
</div>
<button type="submit" class="btn btn-primary mr-2">Submit</button>
