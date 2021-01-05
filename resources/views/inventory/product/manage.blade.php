@push('css')
<!-- JQuery DataTable Css -->
<link href="{{ asset('/') }}backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css"
    rel="stylesheet">
@endpush

@extends('inventory.master')
@section('product') active @endsection
@section('product_manage') active @endsection
@section('title') Manage product @endsection
@section('content')
<section class="content">

    <div class="container-fluid">
        <ol class="breadcrumb breadcrumb-col-pink ">
            <li><a href="{{ route('product.index') }}"><i class="material-icons">store</i> Product </a> </li>
            <li class="active"> <i class="material-icons"> add </i>Manage product</li>
        </ol>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2 class="text-uppercase">
                            All product Here <a href="{{ route('product.create') }}"
                                class="btn btn-info waves-effect ml-auto">
                                ADD PRODUCT</a>
                        </h2>

                    </div>
                    <div class="body">
                        <div class="table-responsive text-center">
                            <table
                                class=" table-bordered table-striped table-hover @if (count($products)>0) dataTable js-exportable @endif">

                                @if (count($products)>0)
                                <thead>
                                    <tr class="text-uppercase">
                                        <th>SL</th>
                                        <th>Product Name</th>
                                        <th>Product Image</th>
                                        <th>Product Code</th>
                                        <th>Category Name</th>
                                        <th>Supplier Name </th>
                                        <th>Product Grage </th>
                                        <th>Product Root </th>
                                        <th>Expire Date </th>
                                        <th>Selling Price </th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i=1)
                                    @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $product->product_name }}</td>
                                        <td>
                                            <img src="@if(isset($product->photo)){{ asset('/').$product->photo}} @else
                                        {{ asset('/') }}backend/images/user.png @endif"
                                                style="height: 100px; width: 100px" alt="Product Image">
                                        </td>
                                        <td>{{ $product->product_code }}</td>
                                        <td>{{ $product->category_name }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->product_place }}</td>
                                        <td>{{ $product->product_route }}</td>
                                        <td>{{ $product->expire_date }}</td>
                                        <td>{{ $product->selling_price }}</td>
                                        <td>
                                            @if ($product->status==1)
                                            <h4><span class="label label-success">Active</span></h4>
                                            @else
                                            <h4><span class="label label-danger">Inactive</span></h4>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($product->status==1)
                                            <a href="{{ route('product.unpublished',['id'=>$product->id]) }}"
                                                class="btn btn-success btn-circle waves-effect waves-circle  waves-float waves-light"
                                                id="unpublished" data-toggle="tooltip" data-placement="top"
                                                title="Unpublished" data-original-title="Unpublished"
                                                style="margin-bottom: 2px!important;">
                                                <i class="material-icons">arrow_downward</i>
                                            </a>
                                            @else
                                            <a href="{{ route('product.published',['id'=>$product->id]) }}"
                                                class="btn btn-warning btn-circle waves-effect waves-circle  waves-float waves-light"
                                                id="published" data-toggle="tooltip" data-placement="top"
                                                title="Published" data-original-title="Published">
                                                <i class="material-icons">publish</i>
                                            </a>
                                            @endif

                                            <a href="{{ route('product.edit',['id'=>$product->id]) }}"
                                                class="btn bg-info btn-info btn-circle waves-effect waves-circle  waves-floa"
                                                data-toggle="tooltip" data-placement="top" title="Edit"
                                                data-original-title="Edit" style="margin-bottom: 2px!important;">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <a href="{{ route('product.destroy',['id'=>$product->id]) }}"
                                                class="btn bg-red btn-circle waves-effect waves-circle  waves-float"
                                                id="delete" data-toggle="tooltip" data-placement="top" title="Delete"
                                                data-original-title="Delete">
                                                <i class="material-icons">delete</i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                @else
                                <span class=" text-danger"> No data found </span>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Exportable Table -->
    </div>
</section>

@endsection
