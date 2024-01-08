<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function PendingOrders(){
        $orders = Order::where('status','Pending')->paginate(20);
        return view('admin.pending-orders',compact('orders'));
    }

    public function ConfirmOrder($order_id){
        Order::where('id',$order_id)->update([
            'status' => 'Confirm'
        ]);
        return redirect()->back()->withIcon('success')->withMsg('Order Confirmed!');
    }

    public function CancelOrder($order_id){
        Order::where('id',$order_id)->update([
            'status' => 'Cancel'
        ]);
        return redirect()->back()->withIcon('warning')->withMsg('Order Canceled!');
    }

    public function CompleteOrder($order_id){
        Order::where('id',$order_id)->update([
            'status' => 'Complete'
        ]);
        return redirect()->back()->withIcon('success')->withMsg('Order Completed!');
    }

    public function ShippingOrder($order_id){
        Order::where('id',$order_id)->update([
            'status' => 'Shipping'
        ]);
        return redirect()->back()->withIcon('success')->withMsg('Order processing for shipping!');
    }

    public function ConfirmOrders(){
        $orders = Order::where('status','Confirm')->paginate(20);
        return view('admin.confirm-orders',compact('orders'));
    }

    public function ShippingOrders(){
        $orders = Order::where('status','Shipping')->latest('id')->paginate(20);
        return view('admin.shipping-orders',compact('orders'));
    }

    public function CompleteOrders(){
        $orders = Order::where('status','Complete')->latest('id')->paginate(20);
        return view('admin.complete-orders',compact('orders'));
    }

    public function CancelOrders(){
        $orders = Order::where('status','Cancel')->latest('id')->paginate(20);
        return view('admin.cancel-orders',compact('orders'));
    }
}
