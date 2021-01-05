@extends('inventory.master')
@section('title') Update Setting @endsection
@section('setting') active @endsection

@section('content')
<section class="content">
    <ol class="breadcrumb breadcrumb-col-pink ">
        <li><a href="{{ route('setting.index') }}"><i class="material-icons">settings</i>Setting</a></li>
        <li class="active"><i class="material-icons">add</i>Update Setting</li>
    </ol>

    <div class="container-fluid">
        <div class="block-header">
            <h2>UPDATE SETTINGS HERE</h2>
        </div>
        <!-- Input -->
        <form action="{{ route('setting.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">

                            <h2>SETTING</h2>
                        </div>
                        <div class="body">

                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ $setting->company_name }}" name="company_name" required
                                                autofocus>
                                            <label class="form-label"> Company  Name <span
                                                    style="color:red">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ $setting->company_address }}" name="company_address" required
                                                autofocus>
                                            <label class="form-label"> Company Address <span style="color:red">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="email" class="form-control" value="{{ $setting->company_email }}" name="company_email" required
                                                autofocus>
                                            <label class="form-label"> Company Email <span style="color:red">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ $setting->company_phone }}" name="company_phone" required
                                                autofocus>
                                            <label class="form-label"> Company Phone <span style="color:red">*</span></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <b>Old Photo</b>
                                    <div class="form-group form-float">
                                        <img src="@if(isset($setting->company_logo)) {{ asset('/').$setting->company_logo }}  @endif"
                                            style="height: 200px; width: auto" alt="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <b>New Employee Photo</b>
                                    <div class="form-group form-float">

                                        <img src="{{ asset('/') }}backend/images/user.png" style="height: 200px; width: auto" alt="" id="employee_show">
                                        <input type="file" class="custom-file-input" accept="image/*" name="company_logo" id="slideImage"
                                            onchange="showImage(this, 'employee_show')">
                                        <label class="custom-file-label" for="inputGroupFile02" id="fileLabel1"></label>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group form-float">

                                        <button type="submit" class="btn btn-block btn-primary btn-lg  waves-effect"
                                            style="margin-bottom:10px ">UPDATE
                                            SETTING</button>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="id" value="{{ $setting->id }}">
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
