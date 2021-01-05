@push('css')
<!-- Bootstrap Select Css -->
<link href="{{ asset('/') }}backend/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />


@endpush
@extends('inventory.master')
@section('title') Add Product @endsection
@section('product') active @endsection
@section('product_add') active @endsection

@section('content')

<section class="content">
    <ol class="breadcrumb breadcrumb-col-pink ">
        <li><a href="{{ route('product.index') }}"><i class="material-icons">store</i> Product </a></li>
        <li class="active"><i class="material-icons">add</i>Add product</li>
    </ol>

    <div class="container-fluid">
        <div class="block-header">
            <h2 class="text-uppercase">ADD Product HERE</h2>
        </div>
        <!-- Input -->
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">

                            <h2>PRODUCT</h2>
                        </div>
                        <div class="body">

                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line" style="top: 18px !important;">
                                            <input type="text" class="form-control" name="product_name" required
                                                autofocus>
                                            <label class="form-label"> Product Name <span
                                                    style="color:red">*</span></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group form-float">

                                        <div class="form-line">
                                            <b>Category Name</b>
                                            <select name="category_id" class="form-control show-tick">
                                                <option value="">Select Name--------</option>
                                                @foreach ($catagories as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}
                                                </option>

                                                @endforeach

                                            </select>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">

                                        <div class="form-line">
                                            <b>Brand Name</b>
                                            <select name="brand_id" class="form-control show-tick">
                                                <option value="">Select Name--------</option>
                                                @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>

                                                @endforeach

                                            </select>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">

                                        <div class="form-line">
                                            <b>Supplier Name</b>
                                            <select name="supplier_id" class="form-control show-tick">
                                                <option value="">Select Supplier--------</option>
                                                @foreach ($supplier as $supplier)
                                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>

                                                @endforeach

                                            </select>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="product_code" required
                                                autofocus>
                                            <label class="form-label"> Product Code <span
                                                    style="color:red">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="product_place" required
                                                autofocus>
                                            <label class="form-label"> Product Grage <span
                                                    style="color:red">*</span></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="product_route" required
                                                autofocus>
                                            <label class="form-label"> Product Root <span
                                                    style="color:red">*</span></label>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="date" class="form-control" name="buy_date" required autofocus>
                                            <label class="form-label date" style="top: -6px "> Buying Date <span
                                                    style="color:red">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="date" class="form-control" name="expire_date" required
                                                autofocus>
                                            <label class="form-label" style="top: -6px "> Expire Date <span
                                                    style="color:red">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="buying_price" required
                                                autofocus>
                                            <label class="form-label"> Buying Price <span
                                                    style="color:red">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="selling_price" required
                                                autofocus>
                                            <label class="form-label"> Selling Price <span
                                                    style="color:red">*</span></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <b>supplier Photo</b>
                                    <div class="form-group form-float">

                                        <img src="{{ asset('/') }}backend/images/user.png"
                                            style="height: 200px; width: auto" alt="supplier Photo" id="supplier_show">
                                        <input type="file" class="custom-file-input" accept="image/*" name="photo"
                                            id="slideImage" onchange="showImage(this, 'supplier_show')">
                                        <label class="custom-file-label" for="inputGroupFile02" id="fileLabel1"></label>

                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg  waves-effect"
                                    style="margin-bottom:10px ">ADD
                                    PRODUCT</button>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>


    </div>


</section>

@endsection
@push('js')
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

<script src="{{ asset('/') }}backend/js/pages/forms/advanced-form-elements.js"></script>




@endpush
