@extends('tema.app')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Listagem de planos</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.index') }}">Inicio</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="{{ route('plans.index') }}">Planos</a>
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-content">                    
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <a href="{{ route('plans.create') }}" title="Create a product" class="btn btn-primary btn-xs btn_list_options"><i class="fa fa-plus" aria-hidden="true"></i> New Product</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="html5buttons">
                                <div class="dt-buttons btn-group flex-wrap"> <button
                                        class="btn btn-white btn-sm buttons-copy buttons-html5" tabindex="0"
                                        aria-controls="DataTables_Table_0" type="button"><span>Copy</span></button>
                                    <button class="btn btn-white btn-sm buttons-csv buttons-html5" tabindex="0"
                                        aria-controls="DataTables_Table_0" type="button"><span>CSV</span></button>
                                    <button class="btn btn-white btn-sm buttons-excel buttons-html5" tabindex="0"
                                        aria-controls="DataTables_Table_0" type="button"><span>Excel</span></button>
                                    <button class="btn btn-white btn-sm buttons-pdf buttons-html5" tabindex="0"
                                        aria-controls="DataTables_Table_0" type="button"><span>PDF</span></button>
                                    <button class="btn btn-white btn-sm buttons-print" tabindex="0"
                                        aria-controls="DataTables_Table_0" type="button"><span>Print</span></button>
                                </div>
                            </div>
                            
                            <div class="dataTables_length" id="DataTables_Table_0_length"><label>Show <select
                                        name="DataTables_Table_0_length" aria-controls="DataTables_Table_0"
                                        class="custom-select custom-select-sm form-control form-control-sm">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select> entries</label></div>
                            <form action="{{ route('plans.search') }}" method="POST">
                                @csrf
                                <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                    <label>Search: 
                                        <input type="search" name="filter" class="form-control form-control-sm" value="{{ $filters['filter'] ?? '' }}" aria-controls="DataTables_Table_0">
                                    </label>
                                    <button class="btn btn-success btn-xs btn_list_options" type="submit" style="margin-top: -5px">Filtrar</button>
                                </div>
                            </form>        
                            <table class="table table-striped table-bordered table-hover dataTable"
                                id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" role="grid">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" aria-label="Name: activate to sort column ascending"
                                            style="width: 299px;">Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" aria-label="Description: activate to sort column ascending"
                                            style="width: 207px;">Description</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" aria-label="Price: activate to sort column ascending"
                                            style="width: 150px;">Price</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1"
                                        style="width: 150px;">Status</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                        colspan="1"
                                        style="width: 150px;">Actions</th>    
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($plans as $plan)
                                    <tr class="gradeA odd" role="row">
                                        <td>{{ $plan->name }}</td>
                                        <td>{{ $plan->description }}</td>
                                        <td>{{ number_format($plan->price,0,',','.') }}</td>
                                        <td>
                                            <span
                                                class="label label-primary @if($plan->status == 1) label-primary @else label-warning @endif">{{
                                                $plan->status == 1 ? 'enable' : 'disable' }}</span>
                                        </td>
                                        <td class="text-right">
                                            <div class="btn-group">
                                                <a href="{{ route('details.plan.index', $plan->url) }}" class="btn btn-secondary btn-xs btn_list_options">
                                                    <i class="fa fa-list-alt" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{ route('plans.show', $plan->url) }}" class="btn btn-success btn-xs btn_list_options">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                                <a href=" {{ route('plans.edit', $plan->url) }}" class="btn btn-primary btn-xs btn_list_options">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </a>
                                                <form method="POST" action="{{ route('plans.delete', $plan->url) }}">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="submit" class="btn btn-danger btn-xs btn_list_options show_confirm" data-toggle="tooltip" title='Eliminar'><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @if (isset($filters))
                                {!! $plans-> appends($filters)->links() !!} <!-- appends envia variable en la paginacion-->
                            @else
                                {!! $plans-> links() !!}    
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection