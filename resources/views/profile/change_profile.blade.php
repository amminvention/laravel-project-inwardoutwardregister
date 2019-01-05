@extends('layouts.master')
@section('title')Change Password | @endsection
@section('content')
    <div class="content-wrapper" style="min-height: 1490.56px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Change Profile
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="breadcrumb-item active">Change Profile</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class="icon fa fa-check"></i> {{ session('success') }}
                </div>
            @endif

            <div class="box box-solid bg-dark">
                <div class="box-header with-border">
                    <h4 class="box-title"><i class="fa fa-user fa-lg"></i> PROFILE ACCOUNT</h4>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="{{ route('updateProfile') }}">
                    @csrf
                    <div class="box-body">

                        <div class="form-group row">
                            <label for="name" class="col-sm-3 control-label text-right"><span class="text-danger">*</span> Name</label>
                            <div class="col-sm-9">
                                <input id="name" name="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ Auth::user()->name }}">
                                @if ($errors->has('name'))
                                    <div class="invalid-feedback" role="alert">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-3 control-label text-right"><span class="text-danger">*</span> Email</label>

                            <div class="col-sm-9">
                                <input id="email" name="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ Auth::user()->email }}">
                                @if ($errors->has('email'))
                                    <div class="invalid-feedback" role="alert">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="old-password" class="col-sm-3 control-label text-right"><span class="text-danger">*</span> Old Password</label>

                            <div class="col-sm-9">
                                <input type="password" class="form-control{{ session('password') ? ' is-invalid' : '' }}" id="old-password" name="password" placeholder="Enter Old Password">
                                @if (session('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ session('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="new-password" class="col-sm-3 control-label text-right"><span class="text-danger">*</span> New Password</label>

                            <div class="col-sm-9">
                                <input type="password" class="form-control{{ $errors->has('new_password') ? ' is-invalid' : '' }}" id="new-password" name="new_password" placeholder="Enter New Password">
                                @if ($errors->has('new_password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('new_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="confirm-password" class="col-sm-3 control-label text-right"><span class="text-danger">*</span> Confirm Password</label>

                            <div class="col-sm-9">
                                <input type="password" class="form-control{{ $errors->has('new_password_confirmation') ? ' is-invalid' : '' }}" id="confirm-password" name="new_password_confirmation" placeholder="Enter Confirm Password">
                                @if ($errors->has('new_password_confirmation'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('new_password_confirmation') }}</strong>new
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>



                    <!-- /.box-body -->
                    <div class="box-footer text-right">
                        <button type="submit" class="btn btn-primary btn-outline">
                            <i class="ti-save-alt"></i> Save
                        </button>
                        <a class="btn btn-warning btn-outline mr-1" href="{{ route('changeProfile') }}">
                            <i class="ti-trash"></i> Cancel
                        </a>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>

        </section>
        <!-- /.content -->


    </div>
@endsection