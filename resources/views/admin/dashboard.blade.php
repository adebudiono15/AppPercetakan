@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
    <div class="content">
        <div class="panel-header bg-dark-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">@yield('title')</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-inner mt--5">
            <div class="row mt--2 justify-content-center">
                <div class="col-md-12">
                    <div class="card full-height">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 col-md-3">
                                    <div class="card card-stats card-round">
                                        <div class="card-body ">
                                            <div class="row align-items-center">
                                                <div class="col-icon">
                                                    <div class="icon-big text-center icon-primary bubble-shadow-small">
                                                        <i class="flaticon-users"></i>
                                                    </div>
                                                </div>
                                                <div class="col col-stats ml-3 ml-sm-0">
                                                    <div class="numbers">
                                                        <p class="card-category">Visitors</p>
                                                        <h4 class="card-title">1,294</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="card card-stats card-round">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-icon">
                                                    <div class="icon-big text-center icon-info bubble-shadow-small">
                                                        <i class="flaticon-interface-6"></i>
                                                    </div>
                                                </div>
                                                <div class="col col-stats ml-3 ml-sm-0">
                                                    <div class="numbers">
                                                        <p class="card-category">Subscribers</p>
                                                        <h4 class="card-title">1303</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="card card-stats card-round">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-icon">
                                                    <div class="icon-big text-center icon-success bubble-shadow-small">
                                                        <i class="flaticon-graph"></i>
                                                    </div>
                                                </div>
                                                <div class="col col-stats ml-3 ml-sm-0">
                                                    <div class="numbers">
                                                        <p class="card-category">Sales</p>
                                                        <h4 class="card-title">$ 1,345</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="card card-stats card-round">
                                        <div class="card-body">
                                            <div class="row align-items-center">
                                                <div class="col-icon">
                                                    <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                                        <i class="flaticon-success"></i>
                                                    </div>
                                                </div>
                                                <div class="col col-stats ml-3 ml-sm-0">
                                                    <div class="numbers">
                                                        <p class="card-category">Order</p>
                                                        <h4 class="card-title">576</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
    </div>
@endsection