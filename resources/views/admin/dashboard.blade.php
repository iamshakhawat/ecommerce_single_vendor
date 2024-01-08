@extends('admin.layouts.main')
@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 order-1">
            <div class="row">
                <div class="col-lg-3 col-md-3 mb-4">
                    <div class="card">
                        <a href="{{ route('pendingorders') }}">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="{{ asset('admin/assets/img/icons/unicons/chart-success.png') }}"
                                            alt="chart success" class="rounded" />
                                    </div>
                                </div>
                                <span class="fw-medium d-block mb-1">Pending Orders</span>
                                <h3 class="card-title mb-2">{{ count(App\Models\Order::where('status','Pending')->get()) }}</h3>

                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 mb-4">
                    <div class="card">
                        <a href="{{ route('confirmorders') }}">

                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="{{ asset('admin') }}/assets/img/icons/unicons/chart.png"
                                            alt="Credit Card" class="rounded" />
                                    </div>
                                </div>
                                <span>Confrim Orders</span>
                                <h3 class="card-title mb-2">{{ count(App\Models\Order::where('status','Confirm')->get()) }}</h3>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 mb-4">
                    <div class="card">
                        <a href="{{ route('shippingorders') }}">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="{{ asset('admin') }}/assets/img/icons/unicons/wallet-info.png"
                                            alt="Credit Card" class="rounded" />
                                    </div>
                                </div>
                                <span>Shipping Orders</span>
                                <h3 class="card-title mb-2">{{ count(App\Models\Order::where('status','Shipping')->get()) }}</h3>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 mb-4">
                    <div class="card">
                        <a href="{{ route('completeorders') }}">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="{{ asset('admin') }}/assets/img/icons/unicons/cc-warning.png"
                                            alt="Credit Card" class="rounded" />
                                    </div>
                                </div>
                                <span>Competed Orders</span>
                                <h3 class="card-title mb-2">{{ count(App\Models\Order::where('status','Complete')->get()) }}</h3>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 mb-4">
                    <div class="card">
                        <a href="{{ route('cancelorders') }}">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="{{ asset('admin') }}/assets/img/icons/unicons/wallet-info.png"
                                            alt="Credit Card" class="rounded" />
                                    </div>
                                </div>
                                <span>Cancel Orders</span>
                                <h3 class="card-title mb-2">{{ count(App\Models\Order::where('status','Cancel')->get()) }}</h3>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 mb-4">
                    <div class="card">
                        <a href="{{ route('allproduct') }}">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="{{ asset('admin') }}/assets/img/icons/unicons/cc-success.png"
                                            alt="Credit Card" class="rounded" />
                                    </div>
                                </div>
                                <span>Total Products</span>
                                <h3 class="card-title mb-2">{{ count(App\Models\Product::all()) }}</h3>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="{{ asset('admin') }}/assets/img/icons/unicons/wallet.png"
                                        alt="Credit Card" class="rounded" />
                                </div>
                            </div>
                            <span>Total Sale</span>
                            <h3 class="card-title mb-2">${{ App\Models\Order::where('status','Complete')->sum('price') }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
