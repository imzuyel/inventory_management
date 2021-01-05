@push('css')
<!-- JQuery DataTable Css -->
<link href="{{ asset('/') }}backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css"
    rel="stylesheet">
@endpush

@extends('inventory.master')
@section('salary') active @endsection
@section('salary_manage') active @endsection
@section('title') Manage salary @endsection
@section('content')
<section class="content">

    <div class="container-fluid">
        <ol class="breadcrumb breadcrumb-col-pink ">
            <li><a href="{{ route('salary.index') }}"><i class="material-icons">attach_money</i>Salary </a></li>
            <li class="active"><i class="material-icons">add</i>Manage  salary</li>
        </ol>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2 class="text-uppercase">
                            All salary Here <a href="{{ route('salary.create') }}"
                                class="btn btn-info waves-effect ml-auto">
                                ADD salary</a>
                        </h2>

                    </div>
                    <div class="body">
                        <div class="table-responsive text-center">
                            <table
                                class="table table-bordered table-striped table-hover @if(count($salaries)>0) dataTable js-exportable @endif">

                                @if (count($salaries)>0)
                                <thead>
                                    <tr class="text-uppercase">
                                        <th>SL</th>
                                        <th>Employee Name</th>
                                        <th>Employee Photo</th>
                                        <th>Salary </th>
                                        <th>Adavace</th>
                                        <th>Status</th>
                                        <th>Month Year</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i=1)

                                    @foreach ($salaries as $salary)

                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $salary->name }}</td>
                                        <td>
                                            <img src="@if(isset($salary->photo)){{ asset('/').$salary->photo }}
                                            @else {{ asset('/') }}backend/images/user.png @endif"
                                                style="height: 100px; width: 100px" alt="salary Image"></td>
                                        <td>{{ $salary->salary }}</td>
                                        <td>{{ $salary->advance_salary }}</td>
                                        <td>

                                            @if ($salary->salary > $salary->advance_salary)
                                            <span class="label bg-green"> {{ $salary->salary - $salary->advance_salary}}
                                                due </span>
                                            @else
                                            <span class="label bg-red"> {{$salary->advance_salary - $salary->salary }}
                                                advance </span>
                                            @endif



                                        </td>
                                        <td>{{ $prevmonth = date('F', strtotime("last month")) }}</td>

                                        <td>

                                            <a href="{{ route('salary.edit',['id'=>$salary->id]) }}"
                                                class="btn bg-success btn-success btn-circle waves-effect waves-circle waves-float"
                                                data-toggle="tooltip" data-placement="top" title="Edit"
                                                data-original-title="Edit">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <a href="{{ route('salary.destroy',['id'=>$salary->id]) }}"
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
