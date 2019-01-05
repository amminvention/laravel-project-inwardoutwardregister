@section('title')Mode-AddEdit | @endsection
@extends('layouts.master')

@section('content')
    <div class="content-wrapper" style="min-height: 1490.56px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Mode
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="breadcrumb-item active">Inward-Outward Mode Add/Edit</li>
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
                    <h4 class="box-title"><i class="mdi mdi-file-chart fa-lg"></i> IN-OUTWARD MODE ADD PAGE</h4>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST" action="{{ route('modeSave') }}">
                    @csrf
                    <div class="box-body">
                        <div class="form-group row">
                            <label for="mode_name" class="col-sm-3 control-label text-right"><span class="text-danger">*</span> Mode Name</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" id="mode_name" name="name" placeholder="Enter Mode Name">
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="remarks" class="col-sm-3 control-label text-right">Remarks</label>

                            <div class="col-sm-9">
                                <textarea class="form-control" id="remarks" name="remarks" placeholder="Enter Remarks">{{ old('remarks') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-right">
                        <button type="submit" class="btn btn-primary btn-outline">
                            <i class="ti-save-alt"></i> Save
                        </button>
                        <a class="btn btn-warning btn-outline mr-1" href="{{ route('modeIndex') }}">
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