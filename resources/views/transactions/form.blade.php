@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-group" >
    <label for="">Select Regions/NUPCI/DOH</label>
    <select name="region_id" id="" class="select2 form-control">
        <option value="{{ null }}">Select Option</option>
        @foreach($reg as $region)
            <option value="{{ $region->_id }}">{{ $region->name }}</option>
        @endforeach
    </select>
</div>



<div class="form-group">
    <label for="">Volume(Number of Doses)</label>
    <input type="number" min=0 name="amount" class="form-control">
</div>
@push('script')
<script>
    $('.select2').select2({
        placeholder: 'Select an option'
    });

</script>
@endpush
