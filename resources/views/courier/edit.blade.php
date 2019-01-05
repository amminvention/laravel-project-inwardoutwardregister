@extends('layouts.master')
@section('title')Courier-AddEdit | @endsection
@section('content')
    <div class="content-wrapper" style="min-height: 1490.56px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Courier
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="breadcrumb-item active">Courier Add/Edit</li>
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
                    <h4 class="box-title"><i class="mdi mdi-file-chart fa-lg"></i> COURIER EDIT PAGE</h4>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="{{ route('courierUpdate', $courier->id) }}">
                    @csrf
                    <div class="box-body">
                        <div class="form-group row">
                            <label for="courier_name" class="col-sm-3 control-label text-right"><span class="text-danger">*</span> Courier Name</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ $courier->name }}" id="courier_name" name="name" placeholder="Enter Courier Name">
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-sm-3 control-label text-right">Address</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" value="{{ $courier->address }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mobile_no" class="col-sm-3 control-label text-right">Mobile #</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control{{ $errors->has('mobile_no') ? ' is-invalid' : '' }}" id="mobile_no" name="mobile_no" placeholder="Enter Mobile No" value="{{ $courier->mobile }}">
                                @if ($errors->has('mobile_no'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mobile_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 control-label text-right"><span class="text-danger">*</span> Email</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" placeholder="Enter Email" value="{{ $courier->email }}">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert" >
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="website" class="col-sm-3 control-label text-right">Website</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control{{ $errors->has('website') ? ' is-invalid' : '' }}" id="website" name="website" placeholder="E.g: https://laravel.com" value="{{ $courier->website }}">
                                @if ($errors->has('website'))
                                    <span class="invalid-feedback" role="alert" >
                                        <strong>{{ $errors->first('website') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="remarks" class="col-sm-3 control-label text-right">Remarks</label>

                            <div class="col-sm-9">
                                <textarea class="form-control" id="remarks" name="remarks" placeholder="Enter Remarks">{{ $courier->remarks }}</textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-right">
                        <button type="submit" class="btn btn-primary btn-outline">
                            <i class="ti-save-alt"></i> Save
                        </button>
                        <a class="btn btn-warning btn-outline mr-1" href="{{ route('courierIndex') }}">
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