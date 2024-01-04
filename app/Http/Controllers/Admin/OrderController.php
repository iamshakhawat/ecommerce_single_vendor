<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function PendingOrders(){
        return view('admin.pending-orders');
    }

    public function CompletedOrders(){
        return view('admin.completed-orders');
    }

    public function CancelOrders(){
        return view('admin.cancel-orders');
    }
}
