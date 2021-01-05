@push('css')
<!-- JQuery DataTable Css -->
<link href="{{ asset('/') }}backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css"
    rel="stylesheet">
@endpush

@extends('inventory.master')
@section('category') active @endsection
@section('category_manage') active @endsection
@section('title') Manage supplier @endsection
@section('content')
<section class="content">

    <div class="container-fluid">
        <ol class="breadcrumb breadcrumb-col-pink ">
            <li><a href="{{ route('category.index') }}"> <i class="material-icons">subtitles</i>Category</a></li>
            <li class="active"><i class="material-icons">add</i>Manage Category</li>
        </ol>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2 class="text-uppercase">
                            All Category Here <a href="{{ route('category.create') }}"
                                class="btn btn-info waves-effect ml-auto">
                                ADD Category</a>
                        </h2>

                    </div>
                    <div class="body">
                        <div class="table-responsive text-center">
                            <table
                                class="table table-bordered table-striped table-hover @if(count($categories)>0) dataTable js-exportable @endif">

                                @if (count($categories)>0)
                                <thead>
                                    <tr class="text-uppercase">
                                        <th>SL</th>
                                        <th>Category Name</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i=1)

                                    @foreach ($categories as $category)

                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $category->category_name }}</td>
                                        <td>
                                        @if ($category->status==1)
                                        <h4><span class="label label-success">Active</span></h4>
                                        @else
                                        <h4><span class="label label-danger">Inactive</span></h4>
                                        @endif
                                    </td>

                                        <td>
                                            @if ($category->status==1)
                                            <a href="{{ route('category.unpublished',['id'=>$category->id]) }}"
                                                class="btn btn-success btn-circle waves-effect waves-circle waves-float waves-light"
                                                id="unpublished" data-toggle="tooltip" data-placement="top"
                                                title="Unpublished" data-original-title="Unpublished">
                                                <i class="material-icons">arrow_downward</i>
                                            </a>
                                            @else
                                            <a href="{{ route('category.published',['id'=>$category->id]) }}"
                                                class="btn btn-warning btn-circle waves-effect waves-circle waves-float waves-light"
                                                id="published" data-toggle="tooltip" data-placement="top"
                                                title="Published" data-original-title="Published">
                                                <i class="material-icons">publish</i>
                                            </a>
                                            @endif

                                            <a href="{{ route('category.edit',['id'=>$category->id]) }}"
                                                class="btn bg-success btn-success btn-circle waves-effect waves-circle waves-float"
                                                data-toggle="tooltip" data-placement="top" title="Edit"
                                                data-original-title="Edit">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <a href="{{ route('category.destroy',['id'=>$category->id]) }}"
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
