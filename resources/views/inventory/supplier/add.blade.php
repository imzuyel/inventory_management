@push('css')
<!-- Bootstrap Select Css -->
<link href="{{ asset('/') }}backend/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
<style>
    element {}

    .form-group .form-line.focused .form-label {
        top: -15px;
        left: 0;
        font-size: 12px;
    }

</style>
@endpush
@extends('inventory.master')
@section('title') Add supplier @endsection
@section('supplier') active @endsection
@section('supplier_add') active @endsection

@section('content')

<section class="content">
    <ol class="breadcrumb breadcrumb-col-pink ">
        <li><a href="javascript:void(0);"><i class="material-icons">account_circle</i>Supplier</a></li>
        <li class="active"><i class="material-icons">add</i>Add Supplier</li>
    </ol>

    <div class="container-fluid">
        <div class="block-header">
            <h2>ADD SUPLIER HERE</h2>
        </div>
        <!-- Input -->
        <form action="{{ route('supplier.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">

                            <h2>SUPLIER</h2>
                        </div>
                        <div class="body">

                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="name" required autofocus>
                                            <label class="form-label"> Name <span style="color:red">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="email" class="form-control" name="email">
                                            <label class="form-label">Email</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="phone" required>
                                            <label class="form-label">Phone<span style="color:red">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="address" required>
                                            <label class="form-label">Address<span style="color:red">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">

                                        <div class="form-line">
                                            <select name="type" class="form-control show-tick">
                                                <option value="">Select Type--------</option>
                                                <option value="1">Distributor</option>
                                                <option value="2">Whole Seller</option>
                                                <option value="3">Broker</option>
                                            </select>
                                            <label class="form-label">Select Type<span
                                                    style="color:red">*</span></label>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="shop">
                                            <label class="form-label">Shop Name </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="account_holder">
                                            <label class="form-label">Account Holder </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="account_number">
                                            <label class="form-label">Accoun Number</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="bank_name">
                                            <label class="form-label">Bank Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="bank_branch">
                                            <label class="form-label">Bank Branch</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="city" required>
                                            <label class="form-label">City<span style="color:red">*</span></label>
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
                                <div class="col-sm-3">
                                    <div class="form-group form-float">

                                        <button type="submit" class="btn btn-block btn-primary btn-lg  waves-effect"
                                            style="margin-bottom:10px ">ADD
                                            SUPPLIER</button>

                                    </div>
                                </div>

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

{{--  Advance Form  --}}
<script src="{{ asset('/') }}backend/js/pages/forms/advanced-form-elements.js"></script>
@endpush
