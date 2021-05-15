@extends('layouts.admin')
@section('content')
<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="fas fa-table"></i> Basic data table</h3>
                DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, based upon the foundations of progressive enhancement, and will add advanced interaction controls to any HTML table: pagination, instant search and multi-column ordering.
                <a target="_blank" href="https://datatables.net/">(more details)</a>
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
                        @if ($catelist->count()==0)
                           <span>No have category</span> 
                        @else
                            @foreach ($catelist as $item)
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
                                <td class="text-right" style="display:flex;justify-content:flex-end">
                                    <a href="{{route('categories.edit',$item->id)}}" class="btn btn-sm btn-success" style="margin-right:5px">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{route('categories.delete',$item->id)}}" method="POST">
                                        @csrf
                                        @method ('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                            
                                </td>
                            </tr> 
                            @endforeach
                            
                        @endif
                        
                    </table>
                    <hr>
                    {{$catelist->appends(request()->all())->links()}}
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