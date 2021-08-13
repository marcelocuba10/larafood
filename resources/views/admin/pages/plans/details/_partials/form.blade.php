@csrf

<div class="form-group  row"><label class="col-sm-2 col-form-label">Name</label>
    <div class="col-sm-10">
        <input type="text" name="name" class="form-control" placeholder="Enter name" autocomplete="off" value="{{ $detail->name ?? old('name') }}"> <!--old session flash, mantiene el valor si tiene algo -->
    </div>
</div>
<div class="hr-line-dashed"></div>
<div class="form-group row">
    <div class="col-sm-4 col-sm-offset-2">
        <a class="btn btn-white btn-sm" href="{{ route('details.plan.index', $plan->url) }}" >Cancel</a>
        <button class="btn btn-primary btn-sm" type="submit">Save changes</button>
    </div>
</div>