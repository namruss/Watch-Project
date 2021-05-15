@extends('layouts.admin')
@section('content')
<div class="alert alert-success" role="alert">
    <h4 class="alert-heading">Forms</h4>
    <p>Bootstrap's form controls expand on our Rebooted form styles with classes. Use these classes
        to opt into their customized displays for a more consistent rendering across browsers and
        devices. <a target="_blank" href="http://getbootstrap.com/docs/4.3/components/forms/">Bootstrap Forms
            Documentation</a></p>
</div>
<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="far fa-check-square"></i>Create New Category</h3>
            </div>

            <div class="card-body">

                <form action="{{route('categories.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name (required)</label>
                        <input class="form-control" id="name_cate" name="name" placeholder="Name Category" required="">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select  class="form-control" id="status_cate" name="status" required="">
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