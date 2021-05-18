@extends('layouts.admin')
@section('content')
<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Create Form</h4>
</div>
<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="far fa-check-square"></i>Create New Brand</h3>
            </div>

            <div class="card-body">

                <form action="{{route('brands.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name (required)</label>
                        <input class="form-control" id="name_brand" name="name" placeholder="Name Brand" required="">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select  class="form-control" id="status_brand" name="status" required="">
                            <option value=1>Public</option>
                            <option value=0>Private</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div><!-- end card-->
    </div>
</div>
@stop