@push('css')
<!-- JQuery DataTable Css -->
<link href="{{ asset('/') }}backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css"
    rel="stylesheet">
@endpush

@extends('inventory.master')
@section('custommer') active @endsection
@section('custommer_manage') active @endsection
@section('title') Manage custommer @endsection
@section('content')
<section class="content">

    <div class="container-fluid">
        <ol class="breadcrumb breadcrumb-col-pink ">
            <li><a href="javascript:void(0);"><i class="material-icons">supervisor_account</i>Custommer</a></li>
            <li class="active"><i class="material-icons">add</i>Manage custommer</li>
        </ol>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2 class="text-uppercase">
                            All custommer Here <a href="{{ route('custommer.create') }}"
                                class="btn btn-info waves-effect ml-auto">
                                ADD custommer</a>
                        </h2>

                    </div>
                    <div class="body">
                        <div class="table-responsive text-center">
                            <table class=" table-bordered table-striped table-hover @if(count($custommers)>0) dataTable js-exportable @endif">

                                @if (count($custommers)>0)
                                <thead>
                                    <tr class="text-uppercase">
                                        <th>SL</th>
                                        <th>custommer Name</th>
                                        <th>custommer Photo</th>
                                        <th>Email</th>
                                        <th>National Id</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Shop Name</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i=1)

                                    @foreach ($custommers as $custommer)

                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $custommer->name }}</td>
                                        <td>
                                            <img src="@if(isset($custommer->photo)){{ asset('/').$custommer->photo }}
                                            @else {{ asset('/') }}backend/images/user.png @endif"
                                                style="height: 60px; width: 60px" alt="custommer Image"></td>
                                        <td>{{ $custommer->email }}</td>
                                        <td>{{ $custommer->nid }}</td>
                                        <td>{{ $custommer->phone }}</td>
                                        <td>{{ $custommer->address }}</td>
                                        <td>{{ $custommer->shop_name }}</td>

                                        <td>

                                            <a style="margin-bottom:5px; " href="{{ route('custommer.edit',['id'=>$custommer->id]) }}"
                                                class="btn bg-success btn-success btn-circle waves-effect waves-circle waves-float m-b-1"
                                                data-toggle="tooltip" data-placement="top" title="Edit"
                                                data-original-title="Edit">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <a href="{{ route('custommer.destroy',['id'=>$custommer->id]) }}"
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


