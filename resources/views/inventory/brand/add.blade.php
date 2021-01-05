
@extends('inventory.master')
@section('title') Add Brand @endsection
@section('brand') active @endsection
@section('brand_add') active @endsection

@section('content')

<section class="content">
    <ol class="breadcrumb breadcrumb-col-pink ">
        <li><a href="{{ route('brand.index') }}"><i class="material-icons">games</i> Brand </a></li>
        <li class="active"><i class="material-icons">add</i>Add brand</li>
    </ol>

    <div class="container-fluid">
        <div class="block-header">
            <h2>ADD BRAND HERE</h2>
        </div>
        <!-- Input -->
        <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">

                            <h2>BRAND</h2>
                        </div>
                        <div class="body">

                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="brand_name" required autofocus>
                                            <label class="form-label"> Brand Name <span style="color:red">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group form-float">

                                        <button type="submit" class="btn btn-block btn-primary btn-lg  waves-effect"
                                            style="margin-bottom:10px ">ADD
                                            BRAND</button>

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

