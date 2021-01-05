@push('css')
<!-- JQuery DataTable Css -->
<link href="{{ asset('/') }}backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css"
    rel="stylesheet">
@endpush

@extends('inventory.master')
@section('brand') active @endsection
@section('brand_manage') active @endsection
@section('title') Manage Brand @endsection
@section('content')
<section class="content">

    <div class="container-fluid">
        <ol class="breadcrumb breadcrumb-col-pink ">
            <li><a href="{{ route('brand.index') }}"><i class="material-icons">widgets</i> Brand </a> </li>
            <li class="active"> <i class="material-icons"> add </i>Manage brand</li>
        </ol>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2 class="text-uppercase">
                            All brand Here <a href="{{ route('brand.create') }}"
                                class="btn btn-info waves-effect ml-auto">
                                ADD brand</a>
                        </h2>

                    </div>
                    <div class="body">
                        <div class="table-responsive text-center">
                            <table
                                class="table table-bordered table-striped table-hover @if(count($brands)>0) dataTable js-exportable @endif">

                                @if (count($brands)>0)
                                <thead>
                                    <tr class="text-uppercase">
                                        <th>SL</th>
                                        <th>brand Name</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i=1)

                                    @foreach ($brands as $brand)

                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $brand->brand_name }}</td>
                                        <td>
                                        @if ($brand->status==1)
                                        <h4><span class="label label-success">Active</span></h4>
                                        @else
                                        <h4><span class="label label-danger">Inactive</span></h4>
                                        @endif
                                    </td>

                                        <td>
                                            @if ($brand->status==1)
                                            <a href="{{ route('brand.unpublished',['id'=>$brand->id]) }}"
                                                class="btn btn-success btn-circle waves-effect waves-circle waves-float waves-light"
                                                id="unpublished" data-toggle="tooltip" data-placement="top"
                                                title="Unpublished" data-original-title="Unpublished">
                                                <i class="material-icons">arrow_downward</i>
                                            </a>
                                            @else
                                            <a href="{{ route('brand.published',['id'=>$brand->id]) }}"
                                                class="btn btn-warning btn-circle waves-effect waves-circle waves-float waves-light"
                                                id="published" data-toggle="tooltip" data-placement="top"
                                                title="Published" data-original-title="Published">
                                                <i class="material-icons">publish</i>
                                            </a>
                                            @endif

                                            <a href="{{ route('brand.edit',['id'=>$brand->id]) }}"
                                                class="btn bg-success btn-success btn-circle waves-effect waves-circle waves-float"
                                                data-toggle="tooltip" data-placement="top" title="Edit"
                                                data-original-title="Edit">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <a href="{{ route('brand.destroy',['id'=>$brand->id]) }}"
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
