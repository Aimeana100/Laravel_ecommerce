@extends('admin/layout')
@section('page_title','Dashboard')
@section('dashboard_select','active')
@section('container')

<div class="row">

                <!-- MAIN CONTENT-->
                <div class="main-content">
                    <div class="section__content section__content--p30">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="overview-wrap">
                                        <h2 class="title-1">overview</h2>
                                        <a href="{{url('admin/product/manage_product')}}" class="au-btn au-btn-icon au-btn--blue">
                                            <button> <i class="zmdi zmdi-plus"></i>add item </button>
                                            </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-25">
                                <div class="col-sm-6 col-lg-3">
                                    <div class="overview-item overview-item--c1">
                                        <div class="overview__inner">
                                            <div class="overview-box clearfix">
                                                <div class="icon">
                                                    <i class="zmdi zmdi-account-o"></i>
                                                </div>
                                                <div class="text">
                                                    <h2> {{$data['customers']}} </h2>
                                                    <span> Customer </span>
                                                </div>
                                            </div>
                                            <div class="overview-chart">
                                                <canvas id="widgetChart1"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-3">
                                    <div class="overview-item overview-item--c2">
                                        <div class="overview__inner">
                                            <div class="overview-box clearfix">
                                                <div class="icon">
                                                    <i class="zmdi zmdi-shopping-cart"></i>
                                                </div>
                                                <div class="text">
                                                    <h2>{{ $data['items_sold'] }}</h2>
                                                    <span>items solid</span>
                                                </div>
                                            </div>
                                            <div class="overview-chart">
                                                <canvas id="widgetChart2"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-3">
                                    <div class="overview-item overview-item--c3">
                                        <div class="overview__inner">
                                            <div class="overview-box clearfix">
                                                <div class="icon">
                                                    <i class="zmdi zmdi-calendar-note"></i>
                                                </div>
                                                <div class="text">
                                                    <h2> {{$data['items_sold_this_week']}} </h2>
                                                    <span>Last 7 days</span>
                                                </div>
                                            </div>
                                            <div class="overview-chart">
                                                <canvas id="widgetChart3"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-3">
                                    <div class="overview-item overview-item--c4">
                                        <div class="overview__inner">
                                            <div class="overview-box clearfix">
                                                <div class="icon">
                                                    {{-- <i class="zmdi zmdi-money"></i> --}}
                                                </div>
                                                <div class="text">
                                                    <h2> {{$data['orders_total_amount']}} fr</h2>
                                                    <span> total earnings </span>
                                                </div>
                                            </div>
                                            <div class="overview-chart">
                                                <canvas id="widgetChart4"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="au-card recent-report">
                                        <div class="au-card-inner">
                                            <h3 class="title-2">recent reports 2022</h3>
                                            <div class="chart-info">
                                               
                                               
                                                <div class="chart-info__left">
                                                    <div class="chart-note">
                                                        <span class="dot dot--blue"></span>
                                                        <span> New Customers</span>
                                                    </div>
                                                    <div class="chart-note mr-0">
                                                        <span class="dot dot--green"></span>
                                                        <span> New orders </span>
                                                    </div>


                                                </div>
                                                <div class="chart-info__right">
                                                    <div class="chart-statis">
                                                        <span class="index incre">
                                                            <i class="zmdi zmdi-long-arrow-up"></i> 10%  </span>
                                                        <span class="label"> New Customers </span>
                                                    </div>
                                                    <div class="chart-statis mr-0">
                                                        <span class="index decre">
                                                            <i class="zmdi zmdi-long-arrow-down"></i> 25%</span>
                                                        <span class="label">New orders </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="recent-report__chart">
                                                <canvas id="recent-rep-chart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="au-card chart-percent-card">
                                        <div class="au-card-inner">
                                            <h3 class="title-2 tm-b-5">char by %</h3>
                                            <div class="row no-gutters">
                                                <div class="col-xl-12 d-flex">
                                                    <div class="chart-note-wrap">
                                                        <div class="chart-note mr-0 d-block">
                                                            <span class="dot dot--blue"></span>
                                                            <span> Paid orders </span>
                                                        </div>
                                                        <div class="chart-note mr-0 d-block">
                                                            <span class="dot dot--red"></span>
                                                            <span> Unpaid orders </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12">
                                                    <div class="percent-chart">
                                                        <canvas id="percent-chart"></canvas>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="au-card recent-report">
                                        <div class="au-card-inner">
                                            <h3 class="title-2">  2022 Income </h3>
                                            <div class="chart-info">
                                               
                                               
                                                <div class="chart-info__left">
                                                    <div class="chart-note">
                                                        <span class="dot dot--blue"></span>
                                                        <span>  Yealy Income </span>
                                                    </div>
                                                    {{-- <div class="chart-note mr-0">
                                                        <span class="dot dot--green"></span>
                                                        <span> New orders </span>
                                                    </div> --}}


                                                </div>
                                                <div class="chart-info__right">
                                                    <div class="chart-statis">
                                                        <span class="index incre">
                                                            <i class="zmdi zmdi-long-arrow-up"></i> 15%  </span>
                                                        <span class="label">  Income  </span>
                                                    </div>
                                                    {{-- <div class="chart-statis mr-0">
                                                        <span class="index decre">
                                                            <i class="zmdi zmdi-long-arrow-down"></i> 25%</span>
                                                        <span class="label">New orders </span>
                                                    </div> --}}
                                                </div>
                                            </div>
                                            <div class="recent-report__chart">
                                                <canvas id="recent-income-chart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                           
                            </div>


                            <div class="row">
                                <div class="col-lg-12">
                                    <h2 class="title-1 m-b-25">Earnings By Items</h2>
                                    <div class="table-responsive table--no-card m-b-40">
                                        <table class="table table-borderless table-striped table-earning">
                                            <thead>
                                                <tr>
                                                    <th>date</th>
                                                    <th>order ID</th>
                                                    <th>name</th>
                                                    <th class="text-right">price</th>
                                                    <th class="text-right">quantity</th>
                                                    <th class="text-right">total</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach($data['earn_by_items'] as $list)


                                                <tr>
                                                    <td>  {{$list->added_on}} </td>
                                                    <td> {{$list->orders_id}} </td>
                                                    <td> {{$list->name}} </td>
                                                    <td class="text-right"> {{$list->price}} </td>
                                                    <td class="text-right"> {{$list->qty}} </td>
                                                    <td class="text-right"> {{$list->qty * $list->price}} </td>
                                                </tr>

                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                {{-- <div class="col-lg-3">
                                    <h2 class="title-1 m-b-25">Top countries</h2>
                                    <div class="au-card au-card--bg-blue au-card-top-countries m-b-40">
                                        <div class="au-card-inner">
                                            <div class="table-responsive">
                                                <table class="table table-top-countries">
                                                    <tbody>
                                                        <tr>
                                                            <td>United States</td>
                                                            <td class="text-right">$119,366.96</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Australia</td>
                                                            <td class="text-right">$70,261.65</td>
                                                        </tr>
                                                        <tr>
                                                            <td>United Kingdom</td>
                                                            <td class="text-right">$46,399.22</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Turkey</td>
                                                            <td class="text-right">$35,364.90</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Germany</td>
                                                            <td class="text-right">$20,366.96</td>
                                                        </tr>
                                                        <tr>
                                                            <td>France</td>
                                                            <td class="text-right">$10,366.96</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Australia</td>
                                                            <td class="text-right">$5,366.96</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Italy</td>
                                                            <td class="text-right">$1639.32</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            
                            </div>


                      


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="copyright">
                                        <p>Copyright © {{date('Y')}} Nadine. All rights reserved. <a href=""> Nadine MUKESHIMANA </a>.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END MAIN CONTENT-->
</div>
@endsection