@push('css')
<!-- JQuery DataTable Css -->
<link href="{{ asset('/') }}backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css"
    rel="stylesheet">
@endpush

@extends('inventory.master')
@section('supplier') active @endsection
@section('supplier_manage') active @endsection
@section('title') Manage supplier @endsection
@section('content')
<section class="content">

    <div class="container-fluid">
        <ol class="breadcrumb breadcrumb-col-pink ">
            <li><a href="javascript:void(0);"><i class="material-icons">account_circle</i>Supplier</a></li>
            <li class="active"><i class="material-icons">add</i>Manage supplier</li>
        </ol>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2 class="text-uppercase">
                            All supplier Here <a href="{{ route('supplier.create') }}"
                                class="btn btn-info waves-effect ml-auto">
                                ADD supplier</a>
                        </h2>

                    </div>
                    <div class="body">
                        <div class="table-responsive text-center">
                            <table
                                class=" table-bordered table-striped table-hover @if(count($suppliers)>0) dataTable js-exportable @endif">

                                @if (count($suppliers)>0)
                                <thead>
                                    <tr class="text-uppercase">
                                        <th>SL</th>
                                        <th>supplier Name</th>
                                        <th>supplier Photo</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Type</th>
                                        <th>Address</th>
                                        <th>Shop Name</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i=1)

                                    @foreach ($suppliers as $supplier)

                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $supplier->name }}</td>
                                        <td>
                                            <img src="@if(isset($supplier->photo)){{ asset('/').$supplier->photo }}
                                            @else {{ asset('/') }}backend/images/user.png @endif"
                                                style="height: 100px; width: 100px" alt="supplier Image">
                                        </td>
                                        <td>{{ $supplier->email }}</td>
                                        <td>{{ $supplier->phone }}</td>
                                        <td>@if ( $supplier->type==1)
                                            Distributor
                                            @elseif( $supplier->type==2)
                                            Whole Seller
                                            @else Broker
                                            @endif
                                        </td>
                                        <td>{{ $supplier->address }}</td>
                                        <td>{{ $supplier->shop }}</td>

                                        <td>

                                            <a href="{{ route('supplier.edit',['id'=>$supplier->id]) }}"
                                                class="btn bg-success btn-success btn-circle waves-effect waves-circle waves-float"
                                                data-toggle="tooltip" data-placement="top" title="Edit"
                                                data-original-title="Edit">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <a href="{{ route('supplier.destroy',['id'=>$supplier->id]) }}"
                                                class="btn bg-red btn-circle waves-effect waves-circle waves-float"
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
