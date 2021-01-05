@push('css')
<!-- JQuery DataTable Css -->
<link href="{{ asset('/') }}backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css"
    rel="stylesheet">
@endpush

@extends('inventory.master')
@section('setting') active @endsection
@section('title') Manage supplier @endsection
@section('content')
<section class="content">

    <div class="container-fluid">
        <ol class="breadcrumb breadcrumb-col-pink ">
            <li><a href="javascript:void(0);"><i class="material-icons">settings</i>Setting</a></li>
            <li class="active"><i class="material-icons">add</i>Manage setting</li>
        </ol>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2 class="text-uppercase">
                            All setting Here
                        </h2>

                    </div>
                    <div class="body">
                        <div class="table-responsive text-center">
                            <table
                                class="table table-bordered table-striped table-hover">

                                @if (count($setting)>0)
                                <thead>
                                    <tr class="text-uppercase">
                                        <th>SL</th>
                                        <th>Logo</th>
                                        <th>Company Name</th>
                                        <th>Company Address</th>
                                        <th>Company_email</th>
                                        <th>Company phone</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i=1)

                                    @foreach ($setting as $setting)

                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>
                                            <img src="@if(isset($setting->company_logo)){{ asset('/').$setting->company_logo }} @else {{ asset('/') }}backend/images/user.png @endif"
                                                style="height: 100px; width: 100px" alt="Employee Image"></td>
                                        </td>
                                        <td>{{ $setting->company_name }}</td>
                                        <td>{{ $setting->company_address }}</td>
                                        <td>{{ $setting->company_email }}</td>
                                        <td>{{ $setting->company_phone }}</td>
                                        <td>
                                            <a href="{{ route('setting.edit',['id'=>$setting->id]) }}"
                                                class="btn bg-success btn-success btn-circle waves-effect waves-circle waves-float"
                                                data-toggle="tooltip" data-placement="top" title="Edit"
                                                data-original-title="Edit">
                                                <i class="material-icons">edit</i>
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
