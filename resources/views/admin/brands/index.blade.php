@extends('layouts.admin')
@section('content')
<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="fas fa-table"></i> Brand List</h3>
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
                                <th>Name</th>
                                <th>Total Product</th>
                                <th>Status</th>
                                <th>Created Date</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        @if ($brandlist->count()==0)
                           <span>No have brand</span> 
                        @else
                            @foreach ($brandlist as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->product ? $item->product->count() : 0}}</td>
                                <td>
                                @if ($item->status==0)
                                    <span class="btn btn-sm btn-danger">Private</span>
                                @else
                                    <span class="btn btn-sm btn-success">Public</span>
                                @endif
                                </td>
                                <td>{{$item->created_at->format('m-d-Y')}}</td>   
                                <td class="text-right" style="justify-content:flex-end">
                                    <a href="{{route('brands.edit',$item->id)}}" class="btn btn-sm btn-success" style="margin-right:5px">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                       
                                        <a href="{{route('brands.delete',$item->id)}}" class="btn btn-sm btn-danger btndelete">
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
                    {{$brandlist->appends(request()->all())->links()}}
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
