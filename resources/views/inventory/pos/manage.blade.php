@push('css')
<!-- JQuery DataTable Css -->
<link href="{{ asset('/') }}backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css"
    rel="stylesheet">
<link href="{{ asset('/') }}backend/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

<style>
    input[type=number] {
        background-color: #1a171738;

    }

    .btn:not(.btn-link):not(.btn-circle) {
        box-shadow: none;
        background: #1a171738;
    }

    .btn.btn-sm {
        height: 34px;
    }

</style>
@endpush
@extends('inventory.master')
@section('title') POS @endsection
@section('pos') active @endsection
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>INVENTORY</h2>
        </div>
        <h3 class="breadcrumb-bg-pink p-3 text-white" style="color: white;padding: 10px;">PSO(Point Of Sale) <span
                class="pull-right text-white">Date: {{ date('d F Y ') }}</span></h3>
        <h4 class="text-white text-uppercase"> Category </h4>
        <h5>
            @foreach ($categories as $category)
            <span class="label bg-deep-purple">{{ $category->category_name }}</span>
            @endforeach

        </h5>
        <div class="row clearfix">
            <div class="col-lg-5">
                <div class="card">
                    <div class="body">

                        <div class="row clearfix">
                            <div style="padding: 0px 6px 6px;" class="panel bg-light-blue text-white">
                                <h4 class="text-white text-uppercase">
                                    Customer
                                    <button style="color: red;background: white;"
                                        class="btn btn-outline-danger pull-right" data-toggle="modal"
                                        data-target="#defaultModal">Add Customer</button>
                                </h4>
                            </div>

                            @if (Cart::count()>0)
                            <div class="table-responsive text-center">
                                <table class="table-dark table-hover table-responsive table-bordered">
                                    <thead>
                                        <tr class="text-uppercase">
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>Sub total </th>
                                            <th>Delete</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        @foreach ($product_cart as $cart)
                                        <tr>
                                            <td>{{ $cart->name }}</td>
                                            <td>{{ $cart->price }}</td>
                                            <td>
                                                <form action="{{ route('pos.update_cart',['rowId'=>$cart->rowId]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <div class="input-group text-center number-wrapper">
                                                        <input style="top: 10px; width: 50px" type="number"
                                                            class="form-control text-info" min="0" name="qty"
                                                            placeholder="Qty" value="{{ $cart->qty }}">
                                                        <span class="input-group-btn">
                                                            <button style="top: 10px;" class="btn btn-sm "
                                                                type="submit"><i
                                                                    class="material-icons">check</i></button>
                                                        </span>
                                                    </div>
                                                    <input type="hidden" name="rowId" value="{{ $cart->rowId }}">
                                                </form>
                                            </td>
                                            <td>{{ $cart->price*$cart->qty }}</td>
                                            <td><a href="{{  route('pos.delete_cart',['rowId'=>$cart->rowId]) }}"><i
                                                        class="material-icons">delete</i></a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div style="padding: 0px 6px 6px;" class="panel bg-light-green text-white text-center text-uppercase">

                                <h5>Quintity: {{Cart::count() }} </h5>
                                <h5>Subtotal: {{Cart::subtotal() }} </h5>
                                <h5>Vat: {{Cart::tax() }} </h5>

                                <hr>
                                <h4>Total ৳ {{ (int)Cart::total()  }}</h4>
                            </div>
                            <form action="{{ route('pos.create_invoice') }}" method="POST">
                                <div class="form-line">

                                    <b class="text-uppercase">Select Customer</b>
                                    <select name="custommer_id" class="form-control show-tick">
                                        <option disabled="" selected>Select Name--------</option>
                                        @foreach ($custommer as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>

                                        @endforeach

                                    </select>
                                    @error('custommer_id')
                                    <div class="invalid-feedback text-dangerpanel bg-red text-white" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @enderror
                                </div>
                                @csrf

                                <button type="submit" class="btn bg-deep-purple waves-effect pull-right text-uppercase">Create
                                    Invoice</button>
                            </form>
                            @else
                            <span style="align-content: center;" class="text-center text-danger">No Product yet Added in the cart</span>
                            @endif



                        </div>

                    </div>

                </div>
            </div>

            <div class="col-lg-7">
                <div class="card">
                    <div class="header">
                        <h2 class="text-uppercase">
                            All product Here
                        </h2>

                    </div>
                    <div class="body">
                        <div class="table-responsive centered ">
                            <table
                                class="table-bordered  table-hover @if (count($products)>0) dataTable js-exportable @endif">

                                @if (count($products)>0)
                                <thead>
                                    <tr class="text-uppercase">
                                        <th></th>
                                        <th>Product Image</th>
                                        <th>Product Name</th>
                                        <th>Product Code</th>
                                        <th>Category Name</th>
                                        <th>Selling Price </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                    <tr>
                                        <form action="{{ route('pos.add_cart') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                            <input type="hidden" name="name" value="{{ $product->product_name }}">
                                            <input type="hidden" name="qty" value="1">
                                            <input type="hidden" name="price" value="{{ $product->selling_price }}">
                                            <input type="hidden" name="weight" value="1">
                                            <td class="align-middle">
                                                <button type="submit" class="btn btn-sm btn-info">
                                                    <i class="material-icons">add</i>
                                                </button>
                                            </td>
                                            <td>
                                                <img src="@if(isset($product->photo)){{ asset('/').$product->photo}} @else
                                                {{ asset('/') }}backend/images/user.png @endif"
                                                    style="height: 60px; width: 60px;float:right" alt="Product Image">
                                            </td>
                                            <td> {{ $product->product_name }}</td>
                                            <td>{{ $product->product_code }}</td>
                                            <td>{{ $product->category_name }}</td>
                                            <td>{{ $product->selling_price }}</td>
                                        </form>
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


    </div>

    </div>
</section>



{{--  Modal  --}}
@include('inventory.pos.add')
@endsection

@push('js')
<script src="{{ asset('/') }}backend/js/pages/forms/advanced-form-elements.js"></script>
<script src="{{ asset('/') }}backend/js/pages/ui/modals.js"></script>
<script>
    //Image Show Before Upload Start
    $(document).ready(function () {
    $('input[type="file"]').change(function (e) {
    var fileName = e.target.files[0].name;
    if (fileName) {
    $('#fileLabel').html(fileName);
    }
    });
    });

    function showImage(data, imgId) {
    if (data.files && data.files[0]) {
    var obj = new FileReader();

    obj.onload = function (d) {
    var image = document.getElementById(imgId);
    image.src = d.target.result;
    }
    obj.readAsDataURL(data.files[0]);
    }
    }
    //Image Show Before Upload End
</script>
@endpush
