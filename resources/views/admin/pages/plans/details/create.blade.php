@extends('tema.app')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Create new Detail Plan</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.index') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('plans.index') }}">Plans</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('details.plan.index',$plan->url) }}">Plano {{$plan->name}}</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="{{ route('details.plan.create',$plan->url) }}"><b>New Detail</b></a>
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight ecommerce">

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-content">
                    <form action="{{ route('details.plan.store', $plan->url) }}" method="POST">
                        @include('admin.pages.plans.details._partials.form')
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection