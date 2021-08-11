@extends('tema.app')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Detail do Detail Plan {{$plan->name}}</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.index') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('plans.index') }}">Plans</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('details.plan.index',$plan->url) }}">Detalhes {{$plan->name}}</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="{{ route('details.plan.show',[$plan->url, $detail->id]) }}"><b>show Detail</b></a> <!-- cuando pasamos dos valores en el route, lo enviamos via array -->
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
                            <input type="text" name="name" class="form-control" placeholder="Enter name" autocomplete="off" value="{{ $detail->name ?? '' }}">
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group row">
                        <div class="col-sm-4 col-sm-offset-2">
                            <a class="btn btn-white btn-sm" href="{{ route('details.plan.index', $plan->url) }}" >Cancel</a>  
                            <form style="display: inline-table;" method="POST" action="{{ route('details.plan.delete', [$plan->url, $detail->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                            </form> 
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection