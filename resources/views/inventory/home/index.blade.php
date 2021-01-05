@extends('inventory.master')
@section('title') This is Inventory Management System @endsection
@section('base') active @endsection
@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>WELCOME ! DASHBOARD</h2>
        </div>

        <!-- Widgets -->
        <div class="row clearfix">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <div class="icon bg-indigo">
                        <i class="material-icons">add_shopping_cart</i>
                    </div>
                    <div class="content">
                        <div class="text">TOTAL PRODUCT</div>
                        <div class="number count-to" data-from="0" data-to="{{ count($tatal_product) }}" data-speed="1000" data-fresh-interval="20">257
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <div class="icon bg-pink">
                        <i class="material-icons">shopping_cart</i>
                    </div>
                    <div class="content">
                        <div class="text">NEW ORDER</div>
                        <div class="number count-to" data-from="0" data-to="{{ count($tatal_order) }}" data-speed="1000"
                            data-fresh-interval="20">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <div class="icon bg-blue">
                        <i class="material-icons">attach_money</i>
                    </div>
                    <div class="content">
                        <div class="text">TODAY SALE</div>
                        <div class="number count-to" data-from="0" data-to="{{ $total_today }}" data-speed="1000"
                            data-fresh-interval="20">125
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <div class="icon bg-red">
                        <i class="material-icons">monetization_on</i>
                    </div>
                    <div class="content">
                        <div class="text">TODAY COST</div>
                        <div class="number count-to" data-from="0" data-to="{{ $costs }}" data-speed="1000"
                            data-fresh-interval="20">125
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <div class="icon bg-purple">
                        <i class="material-icons">account_circle</i>
                    </div>
                    <div class="content">
                        <div class="text">EMPLOYEE</div>
                        <div class="number count-to" data-from="0" data-to="{{ count($tatal_employee) }}" data-speed="1000"
                            data-fresh-interval="20">257
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <div class="icon bg-indigo">
                        <i class="material-icons">face</i>
                    </div>
                    <div class="content">
                        <div class="text">CUSTOMMER</div>
                        <div class="number count-to" data-from="0" data-to="{{ count($tatal_customer) }}" data-speed="1000"
                            data-fresh-interval="20">257
                        </div>
                    </div>
                </div>
            </div>



        </div>
        <!-- #END# Widgets -->
        <!-- CPU Usage -->
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="header">
                        <div class="row clearfix">
                            <div class="col-xs-12 col-sm-6">
                                <h2>CPU USAGE (%)</h2>
                            </div>
                            <div class="col-xs-12 col-sm-6 align-right">
                                <div class="switch panel-switch-btn">
                                    <span class="m-r-10 font-12">REAL TIME</span>
                                    <label>OFF<input type="checkbox" id="realtime" checked><span
                                            class="lever switch-col-cyan"></span>ON</label>
                                </div>
                            </div>
                        </div>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                    role="button" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Action</a></li>
                                    <li><a href="javascript:void(0);">Another action</a></li>
                                    <li><a href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div id="real_time_chart" class="dashboard-flot-chart"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# CPU Usage -->

    </div>
</section>
@endsection
