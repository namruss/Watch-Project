@extends('layouts.admin')
@section('content')
<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Edit Forms</h4>
</div>
<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="far fa-check-square"></i>Edit Category</h3>
            </div>

            <div class="card-body">

                <form action="{{route('categories.update',$cateObj->id)}}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$cateObj->id}}">
                    @method ('PUT')
                    <div class="form-group">
                        <label for="name">Name (required)</label>
                        <input class="form-control" id="name_cate" name="name" value="{{$cateObj->name}}">
                        @error('name')
                        <p class="help-block" style="color:red">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select  class="form-control" id="status_cate" name="status" >
                            @if ($cateObj->status==0)
                            <option value=0>Private</option>
                            <option value=1>Public</option>
                            @else
                            <option value=1>Public</option>
                            <option value=0>Private</option>    
                            @endif
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div><!-- end card-->
    </div>
</div>
@stop