@include('admin.includes.alerts')

<div class="form-group  row"><label class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
        <input type="text" name="name" class="form-control" placeholder="Enter name" autocomplete="off" value="{{ $plan->name ?? old('name') }}">
    </div>
</div>
<div class="form-group  row"><label class="col-sm-2 col-form-label">Price</label>
    <div class="col-sm-10">
        <input type="text" name="price" class="form-control" placeholder="Enter price" autocomplete="off" value="{{ $plan->price ?? old('price') }}">
    </div>
</div>
<div class="form-group  row"><label class="col-sm-2 col-form-label">Description</label>
    <div class="col-sm-10">
        <input type="text" name="description" class="form-control" placeholder="Enter description" autocomplete="off" value="{{ $plan->description ?? old('description') }}">
    </div>
</div>
<div class="hr-line-dashed"></div>
<div class="form-group row">
    <div class="col-sm-4 col-sm-offset-2">
        <a class="btn btn-white btn-sm" href="{{ route('admin.index') }}" >Cancel</a>
        <button class="btn btn-primary btn-sm" type="submit">Save changes</button>
    </div>
</div>