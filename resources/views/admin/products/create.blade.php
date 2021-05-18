@extends('layouts.admin')
@section('content')
            {{-- <div class="card-body"> --}}
               
                <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="row">
                    <div class="col-md-7">
                        <div class="form-group">
                            <label for="name">Name (required)</label>
                            <input class="form-control" id="name_cate" name="name" placeholder="Name Category">
                            @error('name')
                                <p class="help-block" style="color:red">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea  class="form-control" id="description" name="description">
                            </textarea>
                            
                        </div>
                        {{-- <div class="row">

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h3><i class="fas fa-download"></i>Image</h3>
                                        Files upload with drag & drop
                                    </div>
    
                                    <div class="card-body">
                                        <div class="form-group"></div>
                                        <input type="file" name="image" id="image">
                                    </div>
                                </div>
                            </div>
    
                        </div> --}}
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        
                            
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control" id="category" name="categories_id">
                                @foreach ($cates as $item)
                                   <option value="{{$item->id}}">{{$item->name}}</option> 
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="form-group">
                            <label for="brands">Brand</label>
                            <select class="form-control" id="brands" name="brands_id">
                                @foreach ($brands as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option> 
                             @endforeach
                            </select>
                            
                        </div>
                        <div class="form-group">
                            <label for="price">Price ($)</label>
                            <input class="form-control" id="price" name="price">
                            @error('price')
                                <p class="help-block" style="color:red">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="sale_price">Sale Price</label>
                            <input class="form-control" id="sale_price" name="sale_price">
                            @error('sale_price')
                                <p class="help-block" style="color:red">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input class="form-control" id="stock" name="stock">
                            @error('stock')
                                <p class="help-block" style="color:red">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select  class="form-control" id="status_cate" name="status" required="">
                                <option value=1>Public</option>
                                <option value=0>Private</option>
                            </select>
                        </div>
                       
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                {{-- <form action="{{route('products.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name (required)</label>
                        <input class="form-control" id="name_cate" name="name" placeholder="Name Category">
                        @error('name')
                            <p class="help-block" style="color:red">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select  class="form-control" id="status_cate" name="status" required="">
                            <option value=1>Public</option>
                            <option value=0>Private</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form> --}}

            {{-- </div>
        </div><!-- end card-->
    </div>
</div> --}}
@stop
@section('js')
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
CKEDITOR.replace( 'description' );
</script>
@stop
