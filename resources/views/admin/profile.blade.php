@extends('layouts.admin')
@section('content')
<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9 col-xl-9">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="far fa-user"></i> Profile details</h3>
            </div>

            <div class="card-body">


                <form action="#" method="post" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Full name (required)</label>
                                <input class="form-control" name="name" type="text" value="{{$user->name}}"/>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Valid Email (required)</label>
                                <input class="form-control" name="email" type="email" value="office@website.com" required />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" name="password" type="password" value="" />
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Repeat Password</label>
                                <input class="form-control" name="password2" type="password" value="" />
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Select country:</label>
                                <select class="form-control" name="state">
                                        <option value="AR">Argentina</option>
                                        <option value="AU">Australia</option>
                                        <option value="AT">Austria</option>
                                        <option value="BD">Bangladesh</option>
                                        <option value="BE">Belgium</option>
                                        <option value="BR">Brazil</option>
                                        <option value="BG">Bulgaria</option>
                                        <option value="CA">Canada</option>
                                </select>
                            </div>
                        </div>

                        
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <hr>
                            <button type="button" class="btn btn-primary">Edit profile</button>
                        </div>
                    </div>

                </form>

            </div>
            <!-- end card-body -->

        </div>
        <!-- end card -->

    </div>
    <!-- end col -->



    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3 col-xl-3">
        <div class="card mb-3">
            <div class="card-header">
                <h3><i class="far fa-file-image"></i> Avatar</h3>
            </div>

            <div class="card-body text-center">

                <div class="row">
                    <div class="col-lg-12">
                        <img alt="avatar" class="img-fluid" src="assets/images/avatars/avatar.png">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <button type="button" class="btn btn-danger btn-block mt-3">Delete avatar</button>
                    </div>

                    <div class="col-lg-12">
                        <button type="button" class="btn btn-info btn-block mt-3">Change avatar</button>
                    </div>
                </div>

            </div>
            <!-- end card-body -->

        </div>
        <!-- end card -->

    </div>
    <!-- end col -->


</div>
<!-- end row -->
@stop