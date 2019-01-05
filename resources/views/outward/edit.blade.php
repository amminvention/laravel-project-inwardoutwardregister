@section('title')Outward-AddEdit | @endsection
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
                Outward
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="breadcrumb-item active">Outward Add/Edit</li>
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
                    <h4 class="box-title"><i class="mdi mdi-file-chart fa-lg"></i> OUTWARD EDIT PAGE</h4>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form" method="POST" action="{{ route('outwardUpgrade', $outward->id) }}">
                    @csrf
                    <div class="box-body">
                        <h4 class="box-title text-info">OUTWARD DETAILS</h4>
                        <hr class="my-15">
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="outward-no"><span class="text-danger">*</span> Outward No</label>
                                <input type="text" class="form-control{{ $errors->has('outward_no') ? ' is-invalid' : '' }}" value="{{ $outward->outward_no  }}" id="outward-no" placeholder="Enter Outward No." name="outward_no">
                                @if ($errors->has('outward_no'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('outward_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-3">
                                <label for="outward-date"><span class="text-danger">*</span> Outward Date</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control datepicker pull-right{{ $errors->has('outward_date') ? ' is-invalid' : '' }}" value="{{ \Carbon\Carbon::parse($outward->outward_date)->format('d-m-Y') }}" id="outward-date" placeholder="Select Outward Date" name="outward_date" autocomplete="off">
                                    @if ($errors->has('outward_date'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('outward_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-md-6" id="mode-id">
                                <label><span class="text-danger">*</span> Select Outward Mode</label>
                                <select class="form-control select2{{ $errors->has('mode_id') ? ' is-invalid' : '' }}" name="mode_id" style="width: 100%;">
                                    <option value="">Select One</option>
                                    @foreach ($modes as $id => $name)
                                        <option value="{{ $id }}" {{ $outward->mode_id == $id ? 'selected' : '' }}>{{ $name }}</option>
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
                                    <input type="text" class="form-control datepicker pull-right{{ $errors->has('letter_date') ? ' is-invalid' : '' }}" value="{{ \Carbon\Carbon::parse($outward->letter_date)->format('d-m-Y') }}" id="letter-date" name="letter_date" placeholder="Select Letter Date" autocomplete="off">
                                    @if ($errors->has('letter_date'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('letter_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="letter-ref-no"><span class="text-danger">*</span> Letter Ref. No</label>
                                <input type="text" class="form-control{{ $errors->has('letter_ref_no') ? ' is-invalid' : '' }}" value="{{ $outward->letter_ref_no }}" name="letter_ref_no" id="letter-ref-no" placeholder="Enter Letter No.">
                                @if ($errors->has('letter_ref_no'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('letter_ref_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group col-md-3" id="inward-id">
                                <label>Inward No</label>
                                <select class="form-control select2{{ $errors->has('inward_id') ? ' is-invalid' : '' }}" name="inward_id" style="width: 100%;">
                                    <option value="">Select One</option>
                                    @foreach ($inwards as $id => $name)
                                        <option value="{{ $id }}" {{ $outward->inward_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('inward_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('inward_id') }}</strong>
                                        <style>
                                            #inward-id span[class~="select2-selection--single"] {
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
                                <input type="text" class="form-control{{ $errors->has('subject') ? ' is-invalid' : '' }}" value="{{ $outward->subject }}" id="subject" name="subject" placeholder="Enter Subject">
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
                                <div class="form-group" id="department-id">
                                    <label><span class="text-danger">*</span> Select Department</label>
                                    <select class="form-control select2{{ $errors->has('department_id') ? ' is-invalid' : '' }}" name="department_id" style="width: 100%;" id="department-id">
                                        <option value="">Select One</option>
                                        @foreach ($departments as $id => $name)
                                            <option value="{{ $id }}" {{ $outward->department_id == $id ? 'selected' : '' }}>{{ $name }}</option>
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
                                    <label for="from-details-person-name">Person Name</label>
                                    <input type="text" class="form-control" name="from_details_person_name" value="{{ $outward->from_details_person_name }}" id="from-details-person-name" placeholder="Enter From Person Name">
                                </div>


                            </div>
                            <div class="col-md-6">
                                <h4 class="box-title text-info">TO DETAILS</h4>
                                <hr class="my-15">
                                <div class="form-group">
                                    <label for="to-details-name"><span class="text-danger">*</span> Name</label>
                                    <input type="text" class="form-control{{ $errors->has('to_details_name') ? ' is-invalid' : '' }}" value="{{ $outward->to_details_name }}" name="to_details_name" id="to-details-name" placeholder="Enter Name">
                                    @if ($errors->has('to_details_name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('to_details_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="to-details-place">Place</label>
                                    <input type="text" class="form-control" name="to_details_place" value="{{ $outward->to_details_place }}" id="to-details-place" placeholder="Enter Place">
                                </div>
                                <div class="form-group">
                                    <label for="to-details-address">Address</label>
                                    <input type="text" class="form-control" name="to_details_address" value="{{ $outward->to_details_address }}" id="to-details-address" placeholder="Enter To Address">
                                </div>
                            </div>
                        </div>
                        <h4 class="box-title text-info">COURIER DETAILS</h4>
                        <hr class="my-15">
                        <div class="row">

                            <div class="form-group col-md-3">
                                <label>Select Courier</label>
                                <select class="form-control select2" name="courier_id" style="width: 100%;">
                                    <option value="">Select One</option>
                                    @foreach ($couriers as $id => $name)
                                        <option value="{{ $id }}" {{ $outward->courier_id == $id ? 'selected' : '' }}>{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="courier-details-receipt-no">Receipt No</label>
                                <input type="text" class="form-control" id="courier-details-receipt-no" value="{{ $outward->courier_details_receipt_no }}" name="courier_details_receipt_no" placeholder="Enter Receipt No">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="courier-details-receipt-date">Receipt Date</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control datepicker pull-right{{ $errors->has('courier_details_receipt_date') ? ' is-invalid' : '' }}" value="{{ \Carbon\Carbon::parse($outward->courier_details_receipt_date)->format('d-m-Y') }}" id="courier-details_receipt_date" name="courier_details_receipt_date" placeholder="Select Receipt Date" autocomplete="off">
                                    @if ($errors->has('courier_details_receipt_date'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('courier_details_receipt_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="courier-details-amount">Amount</label>
                                <input type="text" class="form-control{{ $errors->has('courier_details_amount') ? ' is-invalid' : '' }}" id="courier-details-amount" value="{{ $outward->courier_details_amount }}" name="courier_details_amount" placeholder="Enter Amount">
                                @if ($errors->has('courier_details_receipt_date'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('courier_details_receipt_date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <div class="controls">
                                    <input type="checkbox" id="courier-details-is-return" name="courier_details_is_return" value=1 {{ $outward->courier_details_is_return == 1 ? 'checked' : '' }}>
                                    <label for="courier-details-is-return">IsReturn</label>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="courier-details-return-date">Return Date</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control datepicker pull-right{{ $errors->has('courier_details_return_date') ? ' is-invalid' : '' }}" value="{{ \Carbon\Carbon::parse($outward->courier_details_return_date)->format('d-m-Y') }}" id="courier-details-return-date" name="courier_details_return_date" placeholder="Select Return Date" autocomplete="off">
                                    @if ($errors->has('courier_details_return_date'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('courier_details_return_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="courier-details-return-reason">Return Reason</label>
                                <textarea class="form-control" id="courier-details-return-reason" name="courier_details_return_reason" placeholder="Enter Description">{{ $outward->courier_details_return_reason }}</textarea>
                            </div>


                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="courier-details-description">Description</label>
                                <textarea class="form-control" id="courier-details-description" name="courier_details_description" placeholder="Enter Description">{{ $outward->courier_details_description }}</textarea>
                            </div>
                        </div>




                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer text-right">
                        <button type="submit" class="btn btn-primary btn-outline">
                            <i class="ti-save-alt"></i> Save
                        </button>
                        <a class="btn btn-warning btn-outline mr-1" href="{{ route('outwardIndex') }}">
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