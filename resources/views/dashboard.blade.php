@extends('layouts.user_panel')
@section('content')
    <h3>Dashboard</h3>
    @if (count($orders) > 0)
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td>#</td>
                        <td>Order</td>
                        <td>Status</td>
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
                                            <th>Quantity</th>
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
                                                <td>{{ $item->per_item_quantity }}</td>
                                                <td><span
                                                        class=" text-warning">{{ $item->per_item_quantity * $product->price }}</span>
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="3">Total Amount <small>(include delivey + shipping charge)</small>
                                        </td>
                                        <td>{{ $order->price }}</td>
                                    </tr>
                                </table>
                            </td>
                            <td>
                                <span
                                    class="text-white @if ($order->status == 'Complete') bg-success
                                    @elseif($order->status == 'Confirm')
                                    bg-info
                                    @elseif($order->status == 'Shipping')
                                    bg-primary
                                    @else
                                    bg-danger @endif p-1 rounded-1 px-2">{{ $order->status }}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection
