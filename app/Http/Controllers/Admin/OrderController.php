<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
class OrderController extends Controller
{
    public function index(){
        $orderlist=Order::where('status','1')->paginate(10);
        return view('admin.orders.index',['orderlist'=>$orderlist]);
    }

    public function excuted(){
        $orderlist=Order::where('status','3')->paginate(10);
        return view('admin.orders.excuted',['orderlist'=>$orderlist]);
    }

    public function delivery(){
        $orderlist=Order::where('status','2')->paginate(10);
        return view('admin.orders.delivery',['orderlist'=>$orderlist]);
    }

    public function edit($id){
        $order=Order::find($id);
        return view('admin.orders.edit',['order' => $order]);
    }

    public function update(Request $req,$id){
        $order=Order::find($id);
        $order->status=$req->status;
        $order->save();
        if($req->status==1)
        return redirect()->route('orders.index')->with('success', 'Update successfully');
        if($req->status==2)
        return redirect()->route('orders.delivery')->with('success', 'Update successfully');
        if($req->status==3)
        return redirect()->route('orders.excuted')->with('success', 'Update successfully');
    }
}
