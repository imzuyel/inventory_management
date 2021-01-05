@extends('inventory.master')
@section('title') Update cost @endsection
@section('cost') active @endsection
@section('cost_manage') active @endsection

@section('content')

<section class="content">
    <ol class="breadcrumb breadcrumb-col-pink ">
        <li><a href="{{ route('cost.index') }}"><i class="material-icons">widgets</i>cost</a></li>
        <li class="active"><i class="material-icons">add</i>Add cost</li>
    </ol>

    <div class="container-fluid">
        <div class="block-header">
            <h2>ADD cost HERE</h2>
        </div>
        <!-- Input -->
        <form action="{{ route('cost.update') }}" method="POST">
            @csrf
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">

                            <h2>UPDATE For {{ $cost->date }}

                            </h2>
                        </div>
                        <div class="body">

                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <p>Cost Details</p>
                                            <textarea class="form-control border" name="details" id=""
                                                placeholder="Cost details">{{ $cost->details }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="cost_total_price" value="{{ $cost->cost_total_price }}" required
                                                autofocus>
                                            <label class="form-label">Total cost <span
                                                    style="color:red">*</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group form-float">

                                        <button type="submit" class="btn btn-block btn-primary btn-lg  waves-effect"
                                            style="margin-bottom:10px ">UPDATE
                                            cost</button>

                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="date" value="{{ $cost->date }}">
            <input type="hidden" name="month" value="{{ $cost->month }}" >
            <input type="hidden" name="year" value="{{ $cost->year }}" >
            <input type="hidden" name="id" value="{{ $cost->id }}">

        </form>


    </div>


</section>

@endsection
