@extends('tema.app')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Product show</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>E-commerce</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>{{ $plan->name }}</strong>
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight ecommerce">

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-content">
                    <form>
                        
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="name"  value="{{ $plan->name }}" class="form-control" placeholder="Ingrese nombre" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Url</label>
                            <div class="col-sm-10">
                                <input type="text" name="url" class="form-control" value="{{ $plan->url }}" placeholder="Ingrese Url" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Price</label>
                            <div class="col-sm-10">
                                <input type="text" name="price" class="form-control" value="{{ number_format($plan->price,3,',', '.') }}" placeholder="Ingrese precio" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group  row"><label class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <input type="text" name="description" class="form-control" value="{{ $plan->description }}" placeholder="Ingrese descripcion" autocomplete="off">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group row">
                            <div class="col-sm-4 col-sm-offset-2">
                                <button class="btn btn-white btn-sm" type="submit">Cancel</button>
                                <button class="btn btn-primary btn-sm" type="submit">Save changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection