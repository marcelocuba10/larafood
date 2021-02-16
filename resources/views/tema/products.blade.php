@extends('tema.template');

@section('content')

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>E-commerce product list</h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index-2.html">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a>E-commerce</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <strong>Product list</strong>
                        </li>
                    </ol>
                </div>
            </div>

            <div class="wrapper wrapper-content animated fadeInRight ecommerce">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-content">
                                <a href=" {{ url('produtos/new') }}" class="btn btn-primary btn-xs btn_list_options"><i class="fa fa-plus" aria-hidden="true"></i> Novo Cadastro</a>
                                <hr>
                                <table class="footable table table-stripped toggle-arrow-tiny table-hover" data-page-size="15">
                                    <thead>
                                        <tr>
                                            <th data-toggle="name">Nome</th>
                                            <th data-hide="purchase_price">Preco Compra</th>
                                            <th data-hide="sale_price">Preco Venta</th>
                                            <th data-hide="quantity">Quantidade</th>
                                            <th data-hide="phone">Status</th>
                                            <th class="text-right" data-sort-ignore="true">Acoes</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>
                                                    {{ $product["name"] }}
                                                </td>
                                                <td>
                                                    {{ $product["purchase_price"] }}
                                                </td>
                                                <td>
                                                    {{ $product["sale_price"] }}
                                                </td>
                                                <td>
                                                    {{ $product["quantity"] }}
                                                </td>
                                                <td>
                                                    <span class="label label-primary">Ativo</span>
                                                </td>
                                                <td class="text-right">
                                                    <div class="btn-group">
                                                        <button class="btn btn-success btn-xs btn_list_options" data-bs-toggle="tooltip" data-bs-placement="top" title="View"><i class="fa fa-eye" aria-hidden="true"></i></button>
                                                        <a href=" {{ url('produtos/'.$product->id.'/edit') }}" class="btn btn-primary btn-xs btn_list_options"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                        <button type="button" class="btn btn-danger btn-xs btn_list_options" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="6">
                                                <ul class="pagination float-right"></ul>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>


            </div>

@endsection