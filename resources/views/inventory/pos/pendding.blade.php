@push('css')
<!-- JQuery DataTable Css -->
<link href="{{ asset('/') }}backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css"
    rel="stylesheet">
@endpush

@extends('inventory.master')
@section('title') Manage order @endsection
@section('order') active @endsection
@section('order_pendding') active @endsection
@section('content')
<section class="content">

    <div class="container-fluid">
        <ol class="breadcrumb breadcrumb-col-pink ">
            <li><a href="{{ route('order.index') }}"><i class="material-icons">input</i>Order </a> </li>
            <li class="active"> <i class="material-icons"> add </i>Manage order</li>
        </ol>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2 class="text-uppercase">
                            All pendding order
                        </h2>

                    </div>
                    <div class="body">
                        <div class="table-responsive text-center">
                            <table
                                class="table table-bordered table-striped table-hover @if (count($penddings)>0) dataTable js-exportable @endif">

                                @if (count($penddings)>0)
                                <thead>
                                    <tr class="text-uppercase">
                                        <th>SL</th>
                                        <th>Custommer Name</th>
                                        <th>Order date</th>
                                        <th>Total products</th>
                                        <th>Total</th>
                                        <th>Payment status </th>
                                        <th>Order status </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i=1)
                                    @foreach ($penddings as $pendding)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $pendding->name }}</td>
                                        <td>{{ $pendding->oder_date }}</td>
                                        <td>{{ $pendding->total_product }}</td>
                                        <td>{{ $pendding->id }}</td>
                                        <td>{{ $pendding->payment_status }}</td>
                                        <td>
                                            @if ($pendding->oder_status=='pendding')
                                            <h4><span class="label label-danger">Pendding</span></h4>
                                            @else
                                            <h4><span class="label label-success">Success</span></h4>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('order.views',['id'=>$pendding->id]) }}"
                                                class="btn bg-info btn-info btn-circle waves-effect waves-circle  waves-floa"
                                                data-toggle="tooltip" data-placement="top" title="View"
                                                data-original-title="Edit" style="margin-bottom: 2px!important;">
                                                <i class="material-icons">remove_red_eye</i>
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
