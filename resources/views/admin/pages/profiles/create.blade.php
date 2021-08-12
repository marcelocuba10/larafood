@extends('tema.app')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Nuevo Perfil</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('profiles.index') }}">Perfiles</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="{{ route('profiles.create') }}"><b>Nuevo Perfil</b></a>
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight ecommerce">

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-content">
                    <form method="POST" action="{{ route('profiles.store') }}">
                        @include('admin.pages.profiles._partials.form')
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection