@section('title')Inward-AddEdit | @endsection
@push('css')
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/vendor_components/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/vendor_components/select2/select2.min.css') }}">
@endpush

@push('scripts')
    <!-- bootstrap datepicker -->
    <script src="{{ asset('assets/plugins/vendor_components/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('assets/plugins/vendor_components/select2/select2.full.js') }}"></script>
    <script>
        $( document ).ready(function () {
            //Date picker
            $('.datepicker').datepicker({
                format: 'dd-mm-yyyy',
                autoclose: true,
                todayHighlight: true
            });

            //Initialize Select2 Elements
            $('.select2').select2();
        })
    </script>
@endpush

@extends('layouts.master')

@section('content')
    <div class="content-wrapper" style="min-height: 1490.56px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Inward
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="breadcrumb-item active">Inward Add/Edit</li>
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
                    <h4 class="box-title"><i class="mdi mdi-file-chart fa-lg"></i> INWARD EDIT PAGE</h4>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form" method="POST" action="{{ route('inwardUpgrade', $inward->id) }}">
                    @csrf
                    <div class="box-body">
                        <h4 class="box-title text-info">INWARD DETAILS</h4>
                        <hr class="my-15">
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="inward-no"><span class="text-danger">*</span> Inward No</label>
                                <input type="text" class="form-control{{ $errors->has('inward_no') ? ' is-invalid' : '' }}" value="{{ $inward->inward_no }}" id="inward-no" placeholder="Enter Inward No." name="inward_no">
                                @if ($errors->has('inward_no'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('inward_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inward-date"><span class="text-danger">*</span> Inward Date</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control datepicker pull-right{{ $errors->has('inward_date') ? ' is-invalid' : '' }}" value="{{ \Carbon\Carbon::parse($inward->inward_date)->format('d-m-Y') }}" id="inward-date" placeholder="Select Inward Date" name="inward_date" autocomplete="off">
                                    @if ($errors->has('inward_date'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('inward_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="receive-date"><span class="text-danger">*</span> Receive Date</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control datepicker pull-right{{ $errors->has('receive_date') ? ' is-invalid' : '' }}" value="{{ \Carbon\Carbon::parse($inward->receive_date)->format('d-m-Y') }}" id="receive-date" placeholder="Select Receive Date" name="receive_date" autocomplete="off">
                                    @if ($errors->has('receive_date'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('receive_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-md-3" id="mode-id">
                                <label><span class="text-danger">*</span> Select Inward Mode</label>
                                <select class="form-control select2{{ $errors->has('mode_id') ? ' is-invalid' : '' }}" name="mode_id" style="width: 100%;">
                                    <option value="">Select One</option>
                                    @foreach ($modes as $id => $name)
                                        <option value="{{ $id }}" {{ $inward->mode_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('mode_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mode_id') }}</strong>
                                        <style>
                                            #mode-id span[class~="select2-selection--single"] {
                                                border-color: #dc3545;
                                            }
                                        </style>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="letter-date"><span class="text-danger">*</span> Letter date</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control datepicker pull-right{{ $errors->has('letter_date') ? ' is-invalid' : '' }}" value="{{ \Carbon\Carbon::parse($inward->letter_date)->format('d-m-Y') }}" id="letter-date" name="letter_date" placeholder="Select Letter Date" autocomplete="off">
                                    @if ($errors->has('letter_date'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('letter_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="letter-ref-no"><span class="text-danger">*</span> Letter Ref. No</label>
                                <input type="text" class="form-control{{ $errors->has('letter_ref_no') ? ' is-invalid' : '' }}" value="{{ $inward->letter_ref_no }}" name="letter_ref_no" id="letter-ref-no" placeholder="Enter Letter No.">
                                @if ($errors->has('letter_ref_no'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('letter_ref_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-3" id="outward-id">
                                <label>Outward No</label>
                                <select class="form-control select2{{ $errors->has('outward_id') ? ' is-invalid' : '' }}" name="outward_id" style="width: 100%;">
                                    <option value="">Select One</option>
                                    @foreach ($outwards as $id => $name)
                                        <option value="{{ $id }}" {{ $inward->outward_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('outward_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('outward_id') }}</strong>
                                        <style>
                                            #outward-id span[class~="select2-selection--single"] {
                                                border-color: #dc3545;
                                            }
                                        </style>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="subject"><span class="text-danger">*</span> Subject</label>
                                <input type="text" class="form-control{{ $errors->has('subject') ? ' is-invalid' : '' }}" value="{{ $inward->subject }}" id="subject" name="subject" placeholder="Enter Subject">
                                @if ($errors->has('subject'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('subject') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="box-title text-info">FROM DETAILS</h4>
                                <hr class="my-15">
                                <div class="form-group">
                                    <label for="from-details-name"><span class="text-danger">*</span> Name</label>
                                    <input type="text" class="form-control{{ $errors->has('from_details_name') ? ' is-invalid' : '' }}" value="{{ $inward->from_details_name }}" name="from_details_name" id="from-details-name" placeholder="Enter From Name">
                                    @if ($errors->has('from_details_name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('from_details_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="from-details-address">Address</label>
                                    <input type="text" class="form-control" name="from_details_address" value="{{ $inward->from_details_address }}" id="from-details-address" placeholder="Enter From Address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4 class="box-title text-info">TO DETAILS</h4>
                                <hr class="my-15">
                                <div class="form-group" id="department-id">
                                    <label><span class="text-danger">*</span> Department</label>
                                    <select class="form-control select2{{ $errors->has('department_id') ? ' is-invalid' : '' }}" name="department_id" style="width: 100%;" id="department-id">
                                        <option value="">Select One</option>
                                        @foreach ($departments as $id => $name)
                                            <option value="{{ $id }}" {{ $inward->department_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('department_id'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('department_id') }}</strong>
                                        <style>
                                            #department-id span[class~="select2-selection--single"] {
                                                border-color: #dc3545;
                                            }
                                        </style>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="to-details-person-name">Person Name</label>
                                    <input type="text" class="form-control" name="to_details_person_name" value="{{ $inward->to_details_person_name }}" id="to-details-person-name" placeholder="Enter To Person Name">
                                </div>
                            </div>
                        </div>
                        <h4 class="box-title text-info">COURIER DETAILS</h4>
                        <hr class="my-15">
                        <div class="row">

                            <div class="form-group col-md-6">
                                <label>Select Courier</label>
                                <select class="form-control select2" name="courier_id" style="width: 100%;">
                                    <option value="">Select One</option>
                                    @foreach ($couriers as $id => $name)
                                        <option value="{{ $id }}" {{ $inward->courier_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="courier-details-courier-name">Courier Name</label>
                                <input type="text" class="form-control" id="courier-details-courier-name" value="{{ $inward->courier_details_courier_name }}" name="courier_details_courier_name" placeholder="Enter Courier Name">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="courier-details-description">Description</label>
                                <textarea class="form-control" id="courier-details-description" name="courier_details_description" placeholder="Enter Description">{{ $inward->courier_details_description }}</textarea>
                            </div>
                        </div>




                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-right">
                        <button type="submit" class="btn btn-primary btn-outline">
                            <i class="ti-save-alt"></i> Save
                        </button>
                        <a class="btn btn-warning btn-outline mr-1" href="{{ route('inwardIndex') }}">
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