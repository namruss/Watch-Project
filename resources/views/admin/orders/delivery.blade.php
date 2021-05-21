@extends('layouts.admin')
@section('css')
<link href="../../../../assetBackEnd/assets/css/me.css" rel="stylesheet"/>
@stop
@section('content')
<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="fas fa-table"></i> Being Delivery Order List</h3>
            </div>
            
            <div class="card-body">
                <form class="form-inline" action="">
                    <label class="sr-only" for="">label</label>
                    <input class="form-control" name="key" id="search" placeholder="Search in here">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button>  
                </form>
                <hr>
                <div class="table-responsive">
                    <table id="dataTable" class="table table-bordered table-hover " style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name User</th>
                                <th>Name Customer Receive</th>
                                <th>Address Receive</th>
                                <th>Phone Receive</th>
                                <th>Payment Method</th>
                                <th>Order Date</th>
                                <th>Amount Product</th>
                                <th>Total </th>
                                
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        @if ($orderlist->count()==0)
                           <span>No have order</span> 
                        @else
                            @foreach ($orderlist as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->user->name}}</td>
                                <td>{{$item->customer_name}}</td>
                                <td>{{$item->customer_address}}</td>
                                <td>{{$item->customer_phone}}</td>
                                @if ($item->payment_method==1)
                                    <td>Payment Online</td>
                                @else
                                    <td>Payment On Delivery</td>
                                @endif
                                <td>
                                  {{$item->order_date}}
                                </td>
                                <td>
                                {{$item->order_detail->count()}}
                                </td>
                                <td>
                                    ${{$item->total}}   
                                </td>
                                <td><span class="btn btn-sm btn-success">Detail</span></td>
                                
                            </tr> 
                            @endforeach
                            
                        @endif@extends('layouts.admin')
                        @section('css')
                        <link href="../../../../assetBackEnd/assets/css/me.css" rel="stylesheet"/>
                        @stop
                        @section('content')
                        <div class="row">
                        
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h3><i class="fas fa-table"></i> Product List</h3>
                                    </div>
                                    
                                    <div class="card-body">
                                        <form class="form-inline" action="">
                                            <label class="sr-only" for="">label</label>
                                            <input class="form-control" name="key" id="search" placeholder="Search in here">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-search"></i>
                                            </button>  
                                        </form>
                                        <hr>
                                        <div class="table-responsive">
                                            <table id="dataTable" class="table table-bordered table-hover " style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name User</th>
                                                        <th>Name Customer Receive</th>
                                                        <th>Address Receive</th>
                                                        <th>Phone Receive</th>
                                                        <th>Payment Method</th>
                                                        <th>Order Date</th>
                                                        <th>Amount Product</th>
                                                        <th>Total </th>
                                                        
                                                        <th class="text-right">Actions</th>
                                                    </tr>
                                                </thead>
                                                @if ($orderlist->count()==0)
                                                   <span>No have order</span> 
                                                @else
                                                    @foreach ($orderlist as $item)
                                                    <tr>
                                                        <td>{{$item->id}}</td>
                                                        <td>{{$item->user->name}}</td>
                                                        <td>{{$item->customer_name}}</td>
                                                        <td>{{$item->customer_address}}</td>
                                                        <td>{{$item->customer_phone}}</td>
                                                        @if ($item->payment_method==1)
                                                            <td>Payment Online</td>
                                                        @else
                                                            <td>Payment On Delivery</td>
                                                        @endif
                                                        <td>
                                                          {{$item->order_date}}
                                                        </td>
                                                        <td>
                                                        {{$item->order_detail->count()}}
                                                        </td>
                                                        <td>
                                                            ${{$item->total}}   
                                                        </td>
                                                        <td><a href="{{route('orders.edit',$item->id)}}" class="btn btn-sm btn-success">Detail</a></td>
                                                        
                                                    </tr> 
                                                    @endforeach
                                                    
                                                @endif
                                                
                                            </table>
                                            <form action="" method="POST"  id="form-delete">
                                                @csrf
                                                @method ('DELETE')
                                            </form>
                                            <hr>
                                            {{$orderlist->appends(request()->all())->links()}}
                                        </div>
                                        <!-- end table-responsive-->
                        
                                    </div>
                                    <!-- end card-body-->
                        
                                </div>
                                <!-- end card-->
                        
                            </div>
                        
                        </div>
                        @stop
                        @section('js')
                            <script>
                                $('.btndelete').click(function(ev){
                                    ev.preventDefault();
                                    var _href=$(this).attr('href');
                                    $('form#form-delete').attr('action',_href);
                                    
                                    if(confirm('Are you sure?')){
                                        $('form#form-delete').submit();
                                    }
                        
                                }
                                )
                            </script> 
                        @stop
                        
                        
                    </table>
                    <form action="" method="POST"  id="form-delete">
                        @csrf
                        @method ('DELETE')
                    </form>
                    <hr>
                    {{$orderlist->appends(request()->all())->links()}}
                </div>
                <!-- end table-responsive-->

            </div>
            <!-- end card-body-->

        </div>
        <!-- end card-->

    </div>

</div>
@stop
@section('js')
    <script>
        $('.btndelete').click(function(ev){
            ev.preventDefault();
            var _href=$(this).attr('href');
            $('form#form-delete').attr('action',_href);
            
            if(confirm('Are you sure?')){
                $('form#form-delete').submit();
            }

        }
        )
    </script> 
@stop
