@extends('layouts.admin')
@section('css')
<link href="../../../../assetBackEnd/assets/css/me.css" rel="stylesheet"/>
@stop
@section('content')
    

                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">

                            <div class="card mb-3">

                                <div class="card-header">
                                    <h3><i class="fas fa-table"></i> Order Detail </h3>
                                </div>

                                <div class="card-body">

                                    <div class="container">

                                        <div class="row">

                                            <div class="col-md-12">

                                                <div class="invoice-title text-center mb-3">
                                                    <h2>Invoice #{{$order->id}}</h2>
                                                    <strong>Date: </strong>{{$order->order_date}}
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-12 col-md-6">
                                                        <h5>Billed To:</h5>
                                                        <address>
                                                            {{$order->user->name}}<br>
                                                            {{$order->user->address}}<br>
                                                            {{$order->user->phone}}<br>
                                                            {{$order->user->email}}
                                                        </address>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-12 col-md-6 text-right">
                                                        <h5>Shipped To:</h5>
                                                        <address>
                                                            {{$order->customer_name}}<br>
                                                            {{$order->customer_address}}<br>
                                                            {{$order->customer_phone}}<br>
                                                        </address>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-xs-12 col-md-6">
                                                        <h5>Payment Method:</h5>
                                                        <address>
                                                            @if ($order->status==1)
                                                                Payment Online
                                                            @endif
                                                            @if ($order->status==2)
                                                                Payment on delivery
                                                            @endif
                                                          
                                                           
                                                        </address>
                                                    </div>
                                                    <div class="col-xs-12 col-md-6 text-right">
                                                        <h5>Order Status:</h5>
                                                        <form action="{{route('orders.update',$order->id)}}"  method="POST">
                                                            @csrf
                                                            @method ('PUT')
                                                        <select name="status">
                                                            <option value="1">Processing</option>
                                                            <option value="2">Being Delivery</option>
                                                            <option value="3">Excuted</option></a>
                                                        </select>
                                                        <br>
                                                        <button id="submitne" type="submit" class="btn btn-sm btn-primary">Change Status</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title"><strong>Order summary</strong></h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="table-responsive">
                                                            <table class="table table-condensed">
                                                                <thead>
                                                                    <tr>
                                                                        <td><strong>Item</strong></td>
                                                                        <td class="text-center"><strong>Image</strong>
                                                                        </td>
                                                                        <td class="text-center"><strong>Price</strong>
                                                                        </td>
                                                                        <td class="text-center">
                                                                            <strong>Quantity</strong></td>
                                                                        <td class="text-right"><strong>Totals</strong>
                                                                        </td>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($order->order_detail as $item)
                                                                    <tr>
                                                                        <td>{{$item->product->name}}</td>
                                                                        <td class="text-center"><img id="image_product_in_list" src="/uploads/{{$item->product->image}}"></td>
                                                                        <td class="text-center">${{$item->price}}</td>
                                                                        <td class="text-center">{{$item->quantity}}</td>
                                                                        <td class="text-right">${{$item->price*$item->quantity}}</td>
                                                                    </tr>
                                                                    @endforeach
                                                                
                                                                    <tr>
                                                                        <td class="thick-line"></td>
                                                                        <td class="thick-line"></td>
                                                                        <td class="thick-line"></td>
                                                                        <td class="thick-line text-center">
                                                                            <strong>Subtotal</strong></td>
                                                                        <td class="thick-line text-right">${{$order->total}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="no-line"></td>
                                                                        <td class="no-line"></td>
                                                                        <td class="no-line"></td>
                                                                        <td class="no-line text-center">
                                                                            <strong>Total</strong></td>
                                                                        <td class="no-line text-right">${{$order->total}}</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- end card body -->

                            </div>
                            <!-- end card-->

                        </div>
                        <!-- end col-->

                    </div>
                    <!-- end row-->


                @stop