@extends('admin.layouts.main')
@section('title', 'Pending Orders')
@section('content')
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Pending Orders <span class="">({{ count($orders) }})</span></h5>
                </div>
                <div class="card-body">
                    @if (count($orders) > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td>#</td>
                                        <td>Order</td>
                                        <td>Status</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>
                                                @php
                                                    $orderitems = App\Models\OrderItem::where('order_id', $order->id)->get();
                                                @endphp
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Photo</th>
                                                            <th>Name</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    @foreach ($orderitems as $item)
                                                        @php
                                                            $products = App\Models\Product::where('id', $item->product_id)->get();
                                                        @endphp
                                                        <tr>
                                                        @foreach ($products as $product)
                                                            <td>
                                                                <img src="{{ asset("upload/products/$product->photo") }}"
                                                                    style="height: 50px" alt="">
                                                            </td>
                                                            <td>{{ $product->product_name }}</td>
                                                            <td>{{ $item->per_item_quantity }} * {{ $product->price }} = <span class=" text-warning">{{ $item->per_item_quantity * $product->price }}</span></td>
                                                        @endforeach
                                                        </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td colspan="3">
                                                            @php
                                                                $address = App\Models\AddressBook::where('id', $order->address_id)->get();
                                                            @endphp
                                                            <strong>Shipping Address:</strong>
                                                            <table>
                                                                <tr>
                                                                    <td>Name:</td>
                                                                    <td>{{ $address[0]->name }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Phone:</td>
                                                                    <td>{{ $address[0]->phone }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>District:</td>
                                                                    <td>{{ $address[0]->district }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>City:</td>
                                                                    <td>{{ $address[0]->city }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Area:</td>
                                                                    <td>{{ $address[0]->area }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Address:</td>
                                                                    <td>{{ $address[0]->address }}</td>
                                                                </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td>
                                                <span class="text-white bg-warning p-1 rounded-1 px-2">{{ $order->status }}</span>
                                            </td>
                                            <td>
                                                <a href="{{ route('confirmorder',$order->id) }}" class="btn btn-sm btn-success mb-3"><i class=" bx bx-check"></i></a>
                                                <a href="{{ route('cancelorder',$order->id) }}" class="btn btn-sm btn-danger mb-3"><i class=" bx bx-x"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            {{ $orders->appends($_GET)->links('pagination::bootstrap-4') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
@endsection
