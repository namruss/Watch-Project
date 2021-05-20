@extends('layouts.admin')
@section('content')
    {{-- <div class="card-body"> --}}

    <form action="{{ route('products.update', $productObj->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method ('PUT')
        <div class="row">
            <div class="col-md-7">
                <div class="form-group">
                    <label for="name">Name (required)</label>
                    <input class="form-control" id="name_cate" name="name" placeholder="Name Category"
                        value="{{ $productObj->name }}">
                    @error('name')
                        <p class="help-block" style="color:red">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description">
                                    {{ $productObj->description }}
                                </textarea>

                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" class="form-control" id="image_upload" name="image_upload">
                    @error('image_upload')
                        <p class="help-block" style="color:red">{{ $message }}</p>
                    @enderror

                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control " id="category" name="categories_id">
                        @foreach ($cates as $item)
                            @if ($item->id == $productObj->categories_id)
                                <option value="{{ $item->id }}" selected>{{ $item->name }} </option>

                            @else
                                <option value="{{ $item->id }}">{{ $item->name }} </option>
                            @endif

                        @endforeach
                    </select>

                </div>
                <div class="form-group">
                    <label for="brands">Brand</label>
                    <select class="form-control" id="brands" name="brands_id">
                        @foreach ($brands as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>

                </div>
                <div class="form-group">
                    @error('price')
                        <label class="col-form-label" for="inputError" style="color:red">{{ $message }}</label>
                    @else
                        <label for="">Price</label>
                        @endif
                        <input type="text" class="form-control @error('price') is-invalid  @enderror" name="price"
                            value="{{ $productObj->price }}">

                    </div>
                    <div class="form-group">
                        @error('sale_price')
                            <label class="col-form-label" for="inputError" style="color:red">{{ $message }}</label>
                        @else
                            <label for="sale_price">Sale Price</label>
                            @endif
                            <input class="form-control @error('price') is-invalid  @enderror" id="sale_price" name="sale_price"
                                value="{{ $productObj->sale_price }}">

                        </div>
                        <div class="form-group">
                            @error('stock')
                                <label class="col-form-label" for="inputError" style="color:red">{{ $message }}</label>
                            @else
                                <label for="stock">Stock</label>
                                @endif
                                <input class="form-control @error('stock') is-invalid  @enderror" id="stock" name="stock"
                                    value="{{ $productObj->stock }}">

                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status_cate" name="status" required="">
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
                    CKEDITOR.replace('description');

                </script>
            @stop
