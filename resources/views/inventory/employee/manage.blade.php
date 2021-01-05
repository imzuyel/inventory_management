@push('css')
<!-- JQuery DataTable Css -->
<link href="{{ asset('/') }}backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css"
    rel="stylesheet">
@endpush

@extends('inventory.master')
@section('employee') active @endsection
@section('employee_manage') active @endsection
@section('title') Manage Employee @endsection
@section('content')
<section class="content">

    <div class="container-fluid">
        <ol class="breadcrumb breadcrumb-col-pink ">
            <li><a href="javascript:void(0);"><i class="material-icons">accessible</i>Employee</a></li>
            <li class="active"><i class="material-icons">add</i>Manage Employee</li>
        </ol>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2 class="text-uppercase">
                            All Employee Here <a href="{{ route('employee.create') }}"
                                class="btn btn-info waves-effect ml-auto">
                                ADD Employee</a>
                        </h2>

                    </div>
                    <div class="body">
                        <div class="table-responsive text-center">
                            <table class="table table-bordered table-striped table-hover @if(count($employees)>0) dataTable js-exportable @endif">

                                @if (count($employees)>0)
                                <thead>
                                    <tr class="text-uppercase">
                                        <th>SL</th>
                                        <th>Employee Name</th>
                                        <th>Employee Photo</th>
                                        <th>Email</th>
                                        <th>National Id</th>
                                        <th>Phone</th>
                                        <th>Salary</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i=1)

                                    @foreach ($employees as $employee)

                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $employee->name }}</td>
                                        <td>
                                            <img src="@if(isset($employee->photo)){{ asset('/').$employee->photo }}
                                            @else {{ asset('/') }}backend/images/user.png @endif" style="height: 100px; width: 100px" alt="Employee Image"></td>
                                        <td>{{ $employee->email }}</td>
                                        <td>{{ $employee->nid }}</td>
                                        <td>{{ $employee->phone }}</td>
                                        <td>{{ $employee->salary }}</td>

                                        <td>

                                                <a href="{{ route('employee.edit',['id'=>$employee->id]) }}"
                                                    class="btn bg-success btn-success btn-circle waves-effect waves-circle waves-float" data-toggle="tooltip" data-placement="top"
                                                    title="Edit" data-original-title="Edit">
                                                    <i class="material-icons">edit</i>
                                                </a>
                                                <a href="{{ route('employee.destroy',['id'=>$employee->id]) }}"
                                                    class="btn bg-red btn-circle waves-effect waves-circle waves-float" id="delete" data-toggle="tooltip"
                                                    data-placement="top" title="Delete" data-original-title="Delete">
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

