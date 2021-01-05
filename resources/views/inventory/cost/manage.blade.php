@push('css')
<!-- JQuery DataTable Css -->
<link href="{{ asset('/') }}backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css"
    rel="stylesheet">
<style>
    .color {
        background: red !important;
    }

</style>
@endpush

@extends('inventory.master')
@section('cost') active @endsection
@section('cost_manage') active @endsection
@section('title') Manage Cost @endsection
@if ($month==date('d-m-y'))
@section('today') color @endsection
@elseif ($month==date('F-y'))
@section('this_month') color @endsection
@elseif ($month==date('y'))
@section('this_year') color @endsection
@elseif ($month==date('y'))
@section('this_year') color @endsection
@elseif ($month=="January".date('-y'))
@section('january') color @endsection
@elseif ($month=="february".date('-y'))
@section('february') color @endsection
@elseif ($month=="march".date('-y'))
@section('march') color @endsection
@elseif ($month=="april".date('-y'))
@section('april') color @endsection
@elseif ($month=="may".date('-y'))
@section('may') color @endsection
@elseif ($month=="june".date('-y'))
@section('june') color @endsection
@elseif ($month=="july".date('-y'))
@section('july') color @endsection
@elseif ($month=="auguest".date('-y'))
@section('auguest') color @endsection
@elseif ($month=="september")
@section('september') color @endsection
@elseif ($month=="october".date('-y'))
@section('october') color @endsection
@elseif ($month=="november".date('-y'))
@section('november') color @endsection
@elseif ($month=="december".date('-y'))
@section('december') color @endsection
@elseif ($month=="all")
@section('all') color @endsection
@endif

@section('content')
<section class="content">

    <div class="container-fluid">
        <ol class="breadcrumb breadcrumb-col-pink ">
            <li><a href="{{ route('cost.index') }}"><i class="material-icons">monetization_on</i>Cost</a></li>
            <li class="active"><i class="material-icons">add</i>Manage cost</li>
        </ol>
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <div class="button-demo">
                                <a href="{{ route('cost.index') }}"
                                    class="btn bg-deep-purple waves-effect @yield('all') ">ALL</a>
                                <a href="{{ route('cost.today') }}"
                                    class="btn bg-deep-purple waves-effect @yield('today') ">TODAY</a>
                                <a href="{{ route('cost.this_month') }}"
                                    class="btn bg-deep-purple waves-effect @yield('this_month')">THIS MONTH</a>
                                <a href="{{ route('cost.this_year') }}"
                                    class="btn bg-deep-purple waves-effect @yield('this_year')">THIS YEAR</a>
                                <a href="{{ route('cost.january') }}"
                                    class="btn bg-deep-purple waves-effect @yield('january')">JANUARY</a>
                                <a href="{{ route('cost.february') }}"
                                    class="btn bg-deep-purple waves-effect @yield('february')">FEBRUARY</a>
                                <a href="{{ route('cost.march') }}"
                                    class="btn bg-deep-purple waves-effect @yield('march')">MARCH</a>
                                <a href="{{ route('cost.april') }}"
                                    class="btn bg-deep-purple waves-effect @yield('april')">APRIL</a>
                                <a href="{{ route('cost.may') }}"
                                    class="btn bg-deep-purple waves-effect @yield('may')">MAY</a>
                                <a href="{{ route('cost.june') }}"
                                    class="btn bg-deep-purple waves-effect @yield('june')">JUNE</a>
                                <a href="{{ route('cost.july') }}"
                                    class="btn bg-deep-purple waves-effect @yield('july')">JULY</a>
                                <a href="{{ route('cost.auguest') }}"
                                    class="btn bg-deep-purple waves-effect @yield('auguest')">AUGUEST</a>
                                <a href="{{ route('cost.september') }}"
                                    class="btn bg-deep-purple waves-effect @yield('september')">SEPTEMBER</a>
                                <a href="{{ route('cost.october') }}"
                                    class="btn bg-deep-purple waves-effect @yield('october')">OCTOBER</a>
                                <a href="{{ route('cost.november') }}"
                                    class="btn bg-deep-purple waves-effect @yield('november')">NOVEMBER</a>
                                <a href="{{ route('cost.december') }}"
                                    class="btn bg-deep-purple waves-effect @yield('december')">DECEMBER</a>
                            </div>
                            <a style=" font-size: 20px;" class="btn bg-purple waves-effect">All Cost For
                                @if($month==date('d-m-y'))
                                {{ date('d F Y') }}
                                @elseif ($month==date('F-y'))
                                {{ date('F Y') }}
                                @elseif ($month==date('y'))
                                {{ date('Y') }}
                                @elseif ($month=="January".date('-y'))
                                January-{{ date('Y') }}
                                @elseif ($month=="february".date('-y'))
                                February-{{ date('Y') }}
                                @elseif ($month=="march".date('-y'))
                                March-{{ date('Y') }}
                                @elseif ($month=="april".date('-y'))
                                April-{{ date('Y') }}
                                @elseif ($month=="may".date('-y'))
                                May-{{ date('Y') }}
                                @elseif ($month=="june".date('-y'))
                                June-{{ date('Y') }}
                                @elseif ($month=="july".date('-y'))
                                July-{{ date('Y') }}
                                @elseif ($month=="auguest".date('-y'))
                                Auguest-{{ date('Y') }}
                                @elseif ($month=="september")
                                September-{{ date('Y') }}
                                @elseif ($month=="october".date('-y'))
                                October-{{ date('Y') }}
                                @elseif ($month=="november".date('-y'))
                                November-{{ date('Y') }}
                                @elseif ($month=="december".date('-y'))
                                December-{{ date('Y') }}
                                @endif
                            </a>
                            <a style=" font-size: 20px;" class="btn bg-info waves-effect pull-right">Total
                                Amount={{ $total }} tk
                            </a>
                        </h2>

                    </div>
                    <div class="body">
                        <div class="table-responsive text-center">
                            <table
                                class="table table-bordered table-striped table-hover @if(count($costs)>0) dataTable js-exportable @endif">

                                @if (count($costs)>0)
                                <thead>
                                    <tr class="text-uppercase">
                                        <th>SL</th>
                                        <th>Details</th>
                                        <th>Total</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @php($i=1)

                                    @foreach ($costs as $cost)

                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $cost->details }}</td>
                                        <td>{{ $cost->cost_total_price }}</td>


                                        <td>
                                            <a href="{{ route('cost.edit',['id'=>$cost->id]) }}"
                                                class="btn bg-success btn-success btn-circle waves-effect waves-circle waves-float"
                                                data-toggle="tooltip" data-placement="top" title="Edit"
                                                data-original-title="Edit">
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <a href="{{ route('cost.destroy',['id'=>$cost->id]) }}"
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
