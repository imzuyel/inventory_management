@extends('inventory.master')
@section('title') Add supplier @endsection
@section('category') active @endsection
@section('category_add') active @endsection

@section('content')

<section class="content">
    <ol class="breadcrumb breadcrumb-col-pink ">
        <li><a href="{{ route('category.index') }}"><i class="material-icons">subtitles</i>Category</a></li>
        <li class="active"><i class="material-icons">add</i>Update Category</li>
    </ol>

    <div class="container-fluid">
        <div class="block-header">
            <h2>ADD Category HERE</h2>
        </div>
        <!-- Input -->
        <form action="{{ route('category.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">

                            <h2>Category</h2>
                        </div>
                        <div class="body">

                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" value="{{ $category->category_name }}" name="category_name" required
                                                autofocus>
                                            <label class="form-label"> CATEGORY NAME <span
                                                    style="color:red">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group form-float">

                                        <button type="submit" class="btn btn-block btn-primary btn-lg  waves-effect"
                                            style="margin-bottom:10px ">UPDATE
                                            CATEGORY</button>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="id" value="{{ $category->id }}">
        </form>
    </div>
</section>
@endsection
@push('js')
<script src="{{ asset('/') }}backend/js/pages/forms/advanced-form-elements.js"></script>
@endpush
