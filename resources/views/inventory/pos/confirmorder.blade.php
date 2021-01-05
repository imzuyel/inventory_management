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
@section('title')Pos @endsection

@if ($order->oder_status=="pendding")
@section('order_pendding') active @endsection
@endif
@if ($order->oder_status=="approve")
@section('order_manage') active @endsection
@endif
@section('order') active @endsection



@section('content')
<section class="content">

    <div class="container-fluid">

        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div id="printableArea" class="card">
                    <div class="card">
                        <h2>
                            My Shop
                            <span class="pull-right"> Order Details <p style="font-size: 14px !important">
                                    {{ $order->oder_date }}
                                </p>
                            </span>
                        </h2>
                        <hr>
                        <div class="header">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div>
                                        <h5>Name :{{ $order->name }}</h5>
                                        <p>Address:{{ $order->address }}</p>
                                        <p style="font-size: 14px;"> <i style="font-size: 14px;"
                                                class="material-icons">call</i>
                                            Email: {{ $order->phone }}</p>
                                        <p style="font-size: 14px;"> <i style="font-size: 14px;"
                                                class="material-icons">email</i> {{ $order->email }}</p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="pull-right">
                                        <p>Order Date : {{ date('d F Y') }}</p>
                                        <p>Order Status : <span class="label bg-deep-purple">{{ $order->oder_status }}</span></p>
                                        <p>Order Id : 0893458978054</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br><br>


                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">

                                    @if (count($order_details)>0)
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Product Name</th>
                                            <th>Product Code</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($i=1)
                                        @foreach ($order_details as $order_detail)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $order_detail->product_name }}</td>
                                            <td>{{ $order_detail->product_code }}</td>
                                            <td>{{ $order_detail->unit_cost }}</td>
                                            <td>{{ $order_detail->quantity }}</td>
                                            <td>{{ $order_detail->unit_cost*$order_detail->quantity }}</td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                    @else
                                    <span class=" text-danger"> No data found </span>
                                    @endif

                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-8">


                                    <div>
                                        <h4>Payment By :{{ $order->payment_status }}</h4>
                                        <p>Total pay :{{ $order->pay }}</p>
                                        <p>Total pay :{{ $order->due }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">

                                    <h5>Sub Total {{ $order->subtotal }}</h5>
                                    <p>Vat {{$order->vat}}</p>
                                    <hr align="left" width="40%">
                                    <h4>Total :{{ $order->total }} </h4>
                                    @if ($order->oder_status=="pendding")
                                    <button onclick="printDiv('printableArea')" class="btn btn-success">
                                        <i class="material-icons">print</i>
                                    </button>
                                    <span>
                                        <a class="btn btn-danger" style="font-size: 14px;"
                                            href="{{ route('order.done',['id'=>$order->id]) }}">Done</a>
                                    </span>

                                    @endif

                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


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
