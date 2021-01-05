@push('css')
<!-- Bootstrap Select Css -->
<link href="{{ asset('/') }}backend/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
@endpush
@extends('inventory.master')
@section('title') Update supplier @endsection
@section('supplier') active @endsection
@section('supplier_manage') active @endsection

@section('content')

<section class="content">
    <ol class="breadcrumb breadcrumb-col-pink ">
        <li><a href="javascript:void(0);"><i class="material-icons">account_circle</i>Supplier</a></li>
        <li class="active"><i class="material-icons">add</i>Update supplier</li>
    </ol>

    <div class="container-fluid">
        <div class="block-header">
            <h2 class="text-uppercase">UPDATE supplier HERE</h2>
        </div>
        <!-- Input -->
        <form action="{{ route('supplier.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">

                            <h2 class="text-uppercase">Supplier</h2>
                        </div>
                        <div class="body">

                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="name"
                                                value="{{ $supplier->name }}" required autofocus>
                                            <label class="form-label"> Name <span style="color:red">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="email" class="form-control" value="{{ $supplier->email }}"
                                                name="email">
                                            <label class="form-label">Email</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="phone"
                                                value="{{ $supplier->phone }}" required>
                                            <label class="form-label">Phone<span style="color:red">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="address" value="{{ $supplier->address }}" required>
                                            <label class="form-label">Address<span style="color:red">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">

                                        <div class="form-line">
                                            <select name="type" class="form-control show-tick">
                                                <option value="">Select Type--------</option>
                                                <option value="1" {{ $supplier->type == 1 ? "selected" : ""}}>
                                                    Distributor</option>
                                                <option value="2" {{ $supplier->type == 2 ? "selected" : ""}}>Whole
                                                    Seller</option>
                                                <option value="3" {{ $supplier->type == 3 ? "selected" : ""}}>Broker
                                                </option>
                                            </select>

                                        </div>

                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ $supplier->shop }}"
                                                name="shop">
                                            <label class="form-label">Shop Name </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control"
                                                value="{{ $supplier->account_holder }}" name="account_holder">
                                            <label class="form-label">Account Holder </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control"
                                                value="{{ $supplier->account_number }}" name="account_number">
                                            <label class="form-label">Accoun Number</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ $supplier->bank_name }}"
                                                name="bank_name">
                                            <label class="form-label">Bank Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ $supplier->bank_branch }}"
                                                name="bank_branch">
                                            <label class="form-label">Bank Branch</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="city"
                                                value="{{ $supplier->city }}" required>
                                            <label class="form-label">City<span style="color:red">*</span></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <b>Old Photo</b>
                                    <div class="form-group form-float">
                                        <img src="@if(isset($supplier->photo)) {{ asset('/').$supplier->photo }}  @endif"
                                            style="height: 200px; width: auto" alt="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <b>New supplier Photo</b>
                                    <div class="form-group form-float">

                                        <img src="{{ asset('/') }}backend/images/user.png"
                                            style="height: 200px; width: auto" alt="" id="supplier_show">
                                        <input type="file" class="custom-file-input" accept="image/*" name="photo"
                                            id="slideImage" onchange="showImage(this, 'supplier_show')">
                                        <label class="custom-file-label" for="inputGroupFile02" id="fileLabel1"></label>

                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group form-float">

                                        <button type="submit" class="btn btn-block btn-primary btn-lg  waves-effect text-uppercase"
                                            style="margin-bottom:10px ">UPDATE
                                            supplier</button>

                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="id" value="{{ $supplier->id }}">
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
