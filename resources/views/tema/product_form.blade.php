@extends('tema.template');

{!! !empty($produto) ? $produto : null !!}

@section('content')

        <div class="wrapper wrapper-content animated fadeInRight ecommerce">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tabs-container">
                            <ul class="nav nav-tabs">
                                <li><a class="nav-link active" data-toggle="tab" href="#tab-1"> Product info</a></li>
                            </ul>
                            <div class="tab-content">

                                <div id="tab-1" class="tab-pane active">
                                    <div class="panel-body">
                                        <form action="{{ route('register_product') }}" method="POST">
                                            <fieldset>
                                                @csrf <!-- componente verifica o token do formulario-->
                                                <div class="form-group row"><label class="col-sm-2 col-form-label">Name:</label>
                                                    <div class="col-sm-10"><input type="text" class="form-control" name="name" placeholder="Product name" value="{{ $produto->name ?? ''}}"></div>
                                                </div>
                                                <div class="form-group row"><label class="col-sm-2 col-form-label">Purchase Price:</label>
                                                    <div class="col-sm-10"><input type="text" class="form-control" name="purchase_price" placeholder="Purchase Price.." value="{{ $produto->purchase_price ?? '' }}"></div>
                                                </div>
                                                <div class="form-group row"><label class="col-sm-2 col-form-label">Sale Price:</label>
                                                    <div class="col-sm-10"><input type="text" class="form-control" name="sale_price" placeholder="Sale Price.." value="{{ $produto->sale_price ?? '' }}"></div>
                                                </div>
                                                <div class="form-group row"><label class="col-sm-2 col-form-label">Quantity:</label>
                                                    <div class="col-sm-10"><input type="text" class="form-control" name="quantity" placeholder="Quantity.." value="{{ $produto->quantity ?? '' }}"></div>
                                                </div>
                                            </fieldset>
                                            <div>
                                                <button class="btn btn-primary float-right" type="submit">Save</button>
                                                <button class="btn btn-secondary float-right">Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        
@endsection        