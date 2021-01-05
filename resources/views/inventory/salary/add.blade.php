@push('css')
<!-- Bootstrap Select Css -->
<link href="{{ asset('/') }}backend/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
<style>
    element {}

    .form-group .form-line.focused .form-label {
        top: -15pxm !important;
        left: 0;
        font-size: 12px;
    }

</style>
@endpush
@extends('inventory.master')
@section('title') Salary @endsection
@section('salary') active @endsection
@section('salary_add') active @endsection

@section('content')

<section class="content">
    <ol class="breadcrumb breadcrumb-col-pink ">
        <li><a href="javascript:void(0);"><i class="material-icons">attach_money</i>Salary</a></li>
        <li class="active"><i class="material-icons">add</i>Add salary</li>
    </ol>

    <div class="container-fluid">
        <div class="block-header">
            <h2 class="text-uppercase">ADD Salary HERE</h2>
        </div>
        <!-- Input -->
        <form action="{{ route('salary.store') }}" method="POST" enctype="multipart/form-data" autocomplete="">
            @csrf
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">

                            <h2>SALARY</h2>
                        </div>
                        <div class="body">

                            <div class="row clearfix">
                                <div class="col-sm-4">
                                    <div class="form-group form-float">

                                        <div class="form-line">
                                            <b>Employee Name</b>
                                            <select name="type" class="form-control show-tick">
                                                <option value="">Select Name--------</option>
                                                @foreach ($employees as $employee)
                                                <option value="1">{{ $employee->name }}</option>

                                                @endforeach

                                            </select>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <b>Month</b>
                                            <select name="month" class="form-control show-tick">

                                                <option>- Month -</option>
                                                <option value="January">January</option>
                                                <option value="Febuary">Febuary</option>
                                                <option value="March">March</option>
                                                <option value="April">April</option>
                                                <option value="May">May</option>
                                                <option value="June">June</option>
                                                <option value="July">July</option>
                                                <option value="August">August</option>
                                                <option value="September">September</option>
                                                <option value="October">October</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>

                                            </select>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group form-float">

                                        <div class="form-line">
                                            <b>Year</b>
                                            <select name="year" class="form-control show-tick">
                                                <option>- Year -</option>
                                                <option value="2020">2020</option>
                                                <option value="2019">2019</option>
                                                <option value="2018">2018</option>
                                                <option value="2017">2017</option>
                                                <option value="2016">2016</option>
                                                <option value="2015">2015</option>

                                            </select>

                                        </div>

                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="advance_salary" required autocomplete=""
                                                autofocus>
                                            <label class="form-label">Advance Salary<span style="color:red">*</span></label>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="form-group form-float">

                                <button type="submit" class="btn btn-primary btn-lg  waves-effect"
                                    style="margin-bottom:10px ">ADD
                                    salary</button>

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
