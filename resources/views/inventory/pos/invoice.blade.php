@push('css')
<!-- JQuery DataTable Css -->
<link href="{{ asset('/') }}backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css"
    rel="stylesheet">+
<link href="{{ asset('/') }}backend/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
<style>
    hr {
        height: 1px;
        background-color: #ccc;
        border: none;
    }
</style>
@endpush
@extends('inventory.master')
@section('title')Pos invoice @endsection
@section('pos') active @endsection


@section('content')
<section class="content">
    <div class="container-fluid">
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div id="printableArea">
                    <div class="card">
                        <h2>
                            My Shop
                            <span class="pull-right"> Invoice <p style="font-size: 14px !important">{{ date('d F Y') }}
                                </p>
                            </span>
                        </h2>
                        <hr>
                        <div class="header">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div >
                                        <h5>NAME :{{ $customer->name }}</h5>
                                        <p>ADDRESS:{{ $customer->address }}</p>
                                        <p style="font-size: 14px;"> EMAIL:  {{ $customer->email }}</p>
                                        <p style="font-size: 14px;">PHONE: {{ $customer->phone }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="pull-right text-uppercase">
                                        <p>Order Date : {{ date('d F Y') }}</p>
                                        <p>Order Status : <span class="label bg-deep-purple">Pendding</span></p>
                                        <p>Order Id : 0893458978054</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br><br>


                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">

                                    @if (count($contents)>0)
                                    <thead>
                                        <tr class="text-uppercase">
                                            <th>SL</th>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($i=1)
                                        @foreach ($contents as $cart)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $cart->name }}</td>
                                            <td>{{ $cart->price }}</td>
                                            <td>{{ $cart->qty }}</td>
                                            <td>{{$cart->price*$cart->qty }}</td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                    @else
                                    <span class="text-danger"> No data found </span>
                                    @endif

                                </table>
                            </div>
                            <h5 class="text-uppercase">#Sub Total {{ Cart::subtotal() }}</h5>
                            <p class="text-uppercase">#Vat {{ Cart::tax() }}</p>
                            <hr align="left" width="40%">
                            <h4 class="text-uppercase">Total :{{ Cart::total() }} </h4>
                            <button  onclick="printDiv('printableArea')" class="btn btn-success">
                                <i class="material-icons">print</i>
                            </button>
                            <span>
                                <button style="font-size: 14px;"  class="btn btn-danger" data-toggle="modal"
                                        data-target="#confirm">
                                    <i style="font-size: 14px;" class="material-icons">navigate_next</i>CONFIRM</button>
                            </span>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>




    @include('inventory.pos.confirm')
    <!-- #END# Exportable Table -->
    </div>
</section>
@endsection
@push('js')
<script>
    function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
    }
</script>
@endpush
