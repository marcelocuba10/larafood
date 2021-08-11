@extends('tema.app')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Edit Detail Plan {{$plan->name}}</h2>
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
                <a href="{{ route('details.plan.edit',[$plan->url, $detail->id]) }}"><b>Edit Detail</b></a> <!-- cuando pasamos dos valores en el route, lo enviamos via array -->
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight ecommerce">

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-content">
                    <form action="{{ route('details.plan.update',[$plan->url,$detail->id]) }}" method="POST">
                        @method('PUT')
                        @include('admin.pages.plans.details._partials.form')
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection