@extends('dashboard')
@section('content')

<div class="app-page-title">
    <div class="page-title-wrapper">
        <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="fal fa-columns icon-gradient bg-ripe-malin"></i>
            </div>
            <div>Dashboard
                <div class="page-title-subheading">Containing some sort of information.</div>
            </div>
        </div>
    </div>
</div>

<div class="tabs-animation">
    <div class="row">
        <div class="col-md-12 col-lg-6">
            <div class="card mb-3 widget-chart widget-chart-hover bg-white card-border">
                <div class="widget-chart-content">
                    <div class="icon-wrapper rounded-circle">
                        <div class="icon-wrapper-bg bg-success"></div>
                        <i class="fal fa-sitemap text-info"></i>
                    </div>
                    @php
                        $product_count = App\Models\Product::all()->count();
                    @endphp
                    <div class="widget-numbers text-info">{{$product_count}}</div>
                    <div class="widget-subheading text-info"><b>Products</b></div>
                    <div class="widget-description text-info"></div>
                </div>
                <div class="widget-progress-wrapper progress-wrapper-bottom">
                    <div class="progress-bar-sm progress">
                        <div class="progress-bar bg-info progress-bar-animated progress-bar-striped" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6">
            <div class="card mb-3 widget-chart widget-chart-hover bg-white card-border">
                <div class="widget-chart-content">
                    <div class="icon-wrapper rounded-circle">
                        <div class="icon-wrapper-bg bg-danger"></div>
                        <i class="fal fa-graduation-cap text-danger"></i>
                    </div>
                    <div class="widget-numbers text-danger">{{Auth::user()->count()}}</div>
                    <div class="widget-subheading text-danger"><b>Users</b></div>
                    <div class="widget-description text-danger"></div>
                </div>
                <div class="widget-progress-wrapper progress-wrapper-bottom">
                    <div class="progress-bar-sm progress">
                        <div class="progress-bar bg-danger progress-bar-animated progress-bar-striped" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6">
            <div class="card mb-3 widget-chart widget-chart-hover bg-white card-border-alternate">
                <div class="widget-chart-content">
                    <div class="icon-wrapper rounded-circle">
                        <div class="icon-wrapper-bg bg-alternate"></div>
                        <i class="fal fa-file-chart-line text-alternate"></i>
                    </div>
                    @php
                        $order_count = App\Models\Order::all()->count();
                    @endphp
                    <div class="widget-numbers text-alternate">{{$order_count}}</div>
                    <div class="widget-subheading text-alternate"><b>Orders</b></div>
                    <div class="widget-description text-alternate"></div>
                </div>
                <div class="widget-progress-wrapper progress-wrapper-bottom">
                    <div class="progress-bar-sm progress">
                        <div class="progress-bar bg-alternate progress-bar-animated progress-bar-striped" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6">
            <div class="card mb-3 widget-chart widget-chart-hover bg-white card-border">
                <div class="widget-chart-content">
                    <div class="icon-wrapper rounded-circle">
                        <div class="icon-wrapper-bg bg-success"></div>
                        <i class="fal fa-laptop text-success"></i>
                    </div>
                    @php
                        $transaction_count = App\Models\Transaction::all()->count();
                    @endphp
                    <div class="widget-numbers text-success">{{$transaction_count}}</div>
                    <div class="widget-subheading text-success"><b>Transactions</b></div>
                    <div class="widget-description text-success"></div>
                </div>
                <div class="widget-progress-wrapper progress-wrapper-bottom">
                    <div class="progress-bar-sm progress">
                        <div class="progress-bar bg-success progress-bar-animated progress-bar-striped" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
