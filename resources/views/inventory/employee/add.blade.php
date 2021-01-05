@extends('inventory.master')

@section('title') Add Employee @endsection
@section('employee') active @endsection
@section('employee_add') active @endsection

@section('content')

<section class="content">
    <ol class="breadcrumb breadcrumb-col-pink ">
        <li><a href="{{ route('employee.index') }}"><i class="material-icons">accessible</i>Employee</a></li>
        <li class="active"><i class="material-icons">add</i>Add Employee</li>
    </ol>

        <div class="container-fluid">
            <div class="block-header">
                <h2>ADD EMPLOYEE HERE</h2>
            </div>
            <!-- Input -->
            <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data" autocomplete="">
                @csrf
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">

                            <h2>EMPLOYEE</h2>
                        </div>
                        <div class="body">

                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="name" required
                                                autocomplete="" autofocus>
                                            <label class="form-label"> Name<span style="color:red">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="email" class="form-control" name="email" required autocomplete="">
                                            <label class="form-label">Email<span style="color:red">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="nid" required autocomplete="">
                                            <label class="form-label">National id <span style="color:red">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="phone" required autocomplete="">
                                            <label class="form-label">Phone<span style="color:red">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="address" required autocomplete="">
                                            <label class="form-label">Address<span style="color:red">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="expreience" required autocomplete="">
                                            <label class="form-label">Expreience<span style="color:red">*</span> </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="salary" required autocomplete="">
                                                <label class="form-label">Salary<span style="color:red">*</span> </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="vacation" required autocomplete="">
                                                <label class="form-label">Vacation<span style="color:red">*</span></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group form-float">
                                            <div class="form-line">
                                                <input type="text" class="form-control" name="city" required autocomplete="">
                                                <label class="form-label">City<span style="color:red">*</span></label>
                                            </div>
                                        </div>
                                    </div>



                                <div class="col-sm-12">
                                    <b>Employee Photo</b>
                                    <div class="form-group form-float">

                                        <img src="{{ asset('/') }}backend/images/user.png" style="height: 200px; width: auto" alt="" id="employee_show">
                                        <input type="file" class="custom-file-input" accept="image/*" name="photo" id="slideImage"
                                            onchange="showImage(this, 'employee_show')">
                                        <label class="custom-file-label" for="inputGroupFile02" id="fileLabel1"></label>

                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group form-float">

                                           <button type="submit" class="btn btn-block btn-primary btn-lg  waves-effect" style="margin-bottom:10px ">ADD
                                                EMPLOYEE</button>

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
@endpush
