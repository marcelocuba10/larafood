@extends('tema.app')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Create new Plan</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.index') }}">Plans</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="{{ route('plans.create') }}"><b>New Plan</b></a>
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight ecommerce">

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-content">
                    <form method="POST" action="{{ route('plans.store') }}">
                        @csrf
                        @include('admin.pages.plans._partials.form')
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection