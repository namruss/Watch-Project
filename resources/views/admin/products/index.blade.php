@extends('layouts.admin')
@section('css')
{{-- <link href="../../../../assetBackEnd/assets/plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet" />
<link href="../../../../assetBackEnd/assets/plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" /> --}}
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
                                <th>Name</th>
                                <th>Image</th>
                                <th>Category</th>
                                <th>Brand</th>
                                <th>Stock</th>
                                <th>Price/Sale</th>
                                <th>Status</th>
                                <th>Created Date</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        @if ($productlist->count()==0)
                           <span>No have product</span> 
                        @else
                            @foreach ($productlist as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td><img id="image_product_in_list" src="../../uploads/{{$item->image}}"></td>
                                <td>{{$item->category->name}}</td>
                                <td>{{$item->brand->name}}</td>
                                <td>{{$item->stock}}</td>
                                <td>
                                   @if ($item->sale_price)
                                       <span>{{$item->price}}/ <span style="font-size:90%" class="badge badge-success">{{$item->sale_price}}</span></span>
                                   @else
                                       <span>{{$item->price}}</span>
                                   @endif 
                                </td>
                                <td>
                                @if ($item->status==0)
                                    <span class="btn btn-sm btn-danger">Private</span>
                                @else
                                    <span class="btn btn-sm btn-success">Public</span>
                                @endif
                                </td>
                                <td>{{$item->created_at->format('m-d-Y')}}</td>   
                                <td class="text-right" style="justify-content:flex-end">
                                    <a href="{{route('products.edit',$item->id)}}" class="btn btn-sm btn-success" style="margin-right:5px">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                       
                                        <a href="{{route('products.delete',$item->id)}}" class="btn btn-sm btn-danger btndelete">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    
                            
                                </td>
                            </tr> 
                            @endforeach
                            
                        @endif
                        
                    </table>
                    <form action="" method="POST"  id="form-delete">
                        @csrf
                        @method ('DELETE')
                    </form>
                    <hr>
                    {{$productlist->appends(request()->all())->links()}}
                </div>
                <!-- end table-responsive-->

            </div>
            <!-- end card-body-->

        </div>
        <!-- end card-->

    </div>

</div>
{{-- <script type="text/javascript">
    $('#search').on('keyup',function(){
        $value = $(this).val();
        $.ajax({
            type: 'get',
            url: '{{ URL::to('admin/categories/search') }}',
            data: {
                'search': $value
            },
            success:function(data){
                $('tbody').html(data);
            }
        });
    })
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script> --}}
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
