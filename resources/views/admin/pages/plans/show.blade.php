@extends('tema.app')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Detail Plan</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.index') }}">Plans</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="{{ route('plans.show', $plan->url) }}"><b>Detail Plan</b></a>
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight ecommerce">

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-content">
                    <div class="form-group  row"><label class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" placeholder="Enter name" autocomplete="off" value="{{ $plan->name ?? '' }}">
                        </div>
                    </div>
                    <div class="form-group  row"><label class="col-sm-2 col-form-label">Price</label>
                        <div class="col-sm-10">
                            <input type="text" name="price" class="form-control" placeholder="Enter price" autocomplete="off" value="{{ $plan->price ?? '' }}">
                        </div>
                    </div>
                    <div class="form-group  row"><label class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <input type="text" name="description" class="form-control" placeholder="Enter description" autocomplete="off" value="{{ $plan->description ?? '' }}">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group row">
                        <div class="col-sm-4 col-sm-offset-2">
                            <a class="btn btn-white btn-sm" href="{{ route('plans.index') }}" >Cancel</a>  
                            <a class="btn btn-danger btn-sm" href="{{ route('plans.delete',$plan->url) }}" >Delete</a>
                        </div> 
                        <div class="col-sm-4 col-sm-offset-2">
                            <form method="POST" action="{{ route('plans.delete', $plan->url) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">Delete with form</button>
                            </form>  
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection