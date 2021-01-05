@extends('inventory.master')

@section('title') Edit Custommer @endsection
@section('custommer') active @endsection
@section('custommer_manage') active @endsection

@section('content')

<section class="content">
    <ol class="breadcrumb breadcrumb-col-pink ">
        <li><a href="javascript:void(0);"><i class="material-icons">supervisor_account</i>Custommer</a></li>
        <li class="active"><i class="material-icons">add</i>Edit Custommer</li>
    </ol>

    <div class="container-fluid">
        <div class="block-header">
            <h2>ADD CUSTOMMER HERE</h2>
        </div>
        <!-- Input -->
        <form action="{{ route('custommer.update') }}" method="POST" enctype="multipart/form-data" autocomplete="on">
            @csrf
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">

                            <h2>CUSTOMMER</h2>
                        </div>
                        <div class="body">

                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="name"
                                                value="{{ $custommer->name }}" required autofocus>
                                            <label class="form-label"> Name <span style="color:red">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="email" class="form-control" value="{{ $custommer->email }}"
                                                name="email">
                                            <label class="form-label">Email</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ $custommer->nid }}"
                                                name="nid">
                                            <label class="form-label">National id</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="phone"
                                                value="{{ $custommer->phone }}" required>
                                            <label class="form-label">Phone<span style="color:red">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="address"
                                                value="{{ $custommer->address }}" required>
                                            <label class="form-label">Address<span style="color:red">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ $custommer->shop_nam }}"
                                                name="shop_name">
                                            <label class="form-label">Shop Name </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control"
                                                value="{{ $custommer->account_holder }}" name="account_holder">
                                            <label class="form-label">Account Holder </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control"
                                                value="{{ $custommer->account_number }}" name="account_number">
                                            <label class="form-label">Accoun Number</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ $custommer->bank_name }}"
                                                name="bank_name">
                                            <label class="form-label">Bank Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control"
                                                value="{{ $custommer->bank_branch }}" name="bank_branch">
                                            <label class="form-label">Bank Branch</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="city"
                                                value="{{ $custommer->city }}" required>
                                            <label class="form-label">City<span style="color:red">*</span></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <b>Old Photo</b>
                                    <div class="form-group form-float">
                                        <img src="@if(isset($custommer->photo)) {{ asset('/').$custommer->photo }}  @endif"
                                            style="height: 200px; width: auto" alt="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <b>New Custommer Photo</b>
                                    <div class="form-group form-float">

                                        <img src="{{ asset('/') }}backend/images/user.png"
                                            style="height: 200px; width: auto" alt="" id="custommer_show">
                                        <input type="file" class="custom-file-input" accept="image/*" name="photo"
                                            id="slideImage" onchange="showImage(this, 'custommer_show')">
                                        <label class="custom-file-label" for="inputGroupFile02" id="fileLabel1"></label>

                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group form-float">

                                        <button type="submit" class="btn btn-block btn-primary btn-lg  waves-effect"
                                            style="margin-bottom:10px ">UPDATE
                                            CUSTOMMER</button>

                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="id" value="{{ $custommer->id }}">
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
@endpush
