@extends('tema.app')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Permisos disponibles para el perfil {{ $profile->name }}</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.index') }}">Inicio</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('profiles.index') }}">Perfiles</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="{{ route('profiles.permissions', $profile->id) }}">Permisos de {{ $profile->name }} </a>
            </li>
            <li class="breadcrumb-item active">
                <a href="{{ route('profiles.permissions.available',$profile->id) }}">Vincular permisos para {{ $profile->name }}</a>
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-content">                    
                    <div class="table-responsive">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="dataTables_length" id="DataTables_Table_0_length">
                                <label>
                                    Mostrar 
                                    <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0"
                                        class="custom-select custom-select-sm form-control form-control-sm">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select> 
                                    registros 
                                </label>
                            </div>

                            <form action="{{ route('profiles.search') }}" method="POST">
                                @csrf
                                <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                    <label>Buscar: 
                                        <input type="search" name="filter" class="form-control form-control-sm" value="{{ $filters['filter'] ?? '' }}" aria-controls="DataTables_Table_0">
                                    </label>
                                    <button class="btn btn-success btn-xs btn_list_options" type="submit" style="border-top-left-radius: 5px !important;border-top-right-radius: 5px !important;margin-top: -5px">Filtrar</button>
                                </div>
                            </form> 

                            <table class="table table-striped table-bordered table-hover dataTable"
                                id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" role="grid">
                                <thead>
                                    <tr role="row">
                                        <th tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1" style="width: 2px">#</th> 
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" aria-label="Name: activate to sort column ascending"
                                            style="width: 299px;">Nombre</th>   
                                    </tr>
                                </thead>
                                <tbody>
                                    <form action="{{ route('profiles.permissions.attach', $profile->id) }}" method="POST">
                                        @csrf
                                        @foreach ($permissions as $permission)
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="permissions[]" value="{{ $permission->id }}">
                                            </td>
                                            <td>{{ $permission->name }}</td>
                                        </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="500">
                                                <button class="btn btn-primary " type="submit"><i class="fa fa-check"></i>&nbsp;Vincular</button>
                                            </td>
                                        </tr>
                                    </form>
                                </tbody>
                            </table>
                            @if (isset($filters))
                                {!! $permissions-> appends($filters)->links() !!} <!-- appends envia variable en la paginacion-->
                            @else
                                {!! $permissions-> links() !!}    
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection