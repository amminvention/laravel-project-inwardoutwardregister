@section('title')Outward | @endsection
@push('css')
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/vendor_components/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/vendor_components/select2/select2.min.css') }}">
    <style>
        .outward-table>tbody>tr>td, .outward-table>tbody>tr>th, .outward-table>tfoot>tr>td, .outward-table>tfoot>tr>th, .outward-table>thead>tr>td, .outward-table>thead>tr>th{
            border-top: 0 solid white;
            line-height: .5;
        }
        .outward-tab-space>tbody>tr>td {
            padding-left: 0;
        }
        .outward-tab-space>tbody>tr>th {
            padding-left: 0;
        }
    </style>
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
    <script>
        $( document ).ready(function () {
            $('.remove-record').click(function() {
                var id = $(this).attr('data-outwardid');
                var url = $(this).attr('data-url');
                $(".remove-record-model").attr("action",url);
                $('body').find('.remove-record-model').append('<input name="id" type="hidden" value="'+ id +'">');
            });

            $('.remove-data-from-delete-form').click(function() {
                $('body').find('.remove-record-model').find( "input" ).remove();
            });

            $('.view-record').click(function() {

                var out_mod = $(this).attr('data-mode');
                var out_dte = $(this).attr('data-outward-date');
                var let_ref_no = $(this).attr('data-letter-ref-no');
                var in_no = $(this).attr('data-inward');
                console.log(in_no);
                var out_no = $(this).attr('data-outward-no');
                var let_dte = $(this).attr('data-letter-date');
                var sub = $(this).attr('data-subject');
                var frm_dpt = $(this).attr('data-department');
                var frm_per_nm = $(this).attr('data-from-details-person-name');
                var to_nm = $(this).attr('data-to-details-name');
                var to_plc = $(this).attr('data-to-details-place');
                var to_add = $(this).attr('data-to-details-address');
                var cor = $(this).attr('data-courier');
                var cor_rec_dte = $(this).attr('data-courier-details-receipt-date');
                var is_ret = $(this).attr('data-courier-details-is-return');
                var ret_res = $(this).attr('data-courier-return-reason');
                var recpt_no = $(this).attr('data-courier-details-receipt-no');
                var amt = $(this).attr('data-courier-details-amount');
                var ret_dte = $(this).attr('data-courier-details-return-date');
                var desc = $(this).attr('data-courier-description');
                var crtd = $(this).attr('data-created');
                var modf = $(this).attr('data-modified');

                $('#out_mod').text(out_mod);
                $('#out_dte').text(out_dte);
                $('#let_ref_no').text(let_ref_no);
                $('#out_no').text(out_no);
                $('#in_no').text(in_no);
                $('#let_dte').text(let_dte);
                $('#sub').text(sub);
                $('#frm_dpt').text(frm_dpt);
                $('#frm_per_nm').text(frm_per_nm);
                $('#to_nm').text(to_nm);
                $('#to_plc').text(to_plc);
                $('#to_add').text(to_add);
                $('#cor').text(cor);
                $('#cor_rec_dte').text(cor_rec_dte);
                $('#is_ret').text(is_ret);
                $('#ret_res').text(ret_res);
                $('#recpt_no').text(recpt_no);
                $('#amt').text(amt);
                $('#ret_dte').text(ret_dte);
                $('#desc').text(desc);
                $('#crtd').text(crtd);
                $('#modf').text(modf);

            });

            $('.remove-data-from-view-form').click(function() {
                $('#out_mod').empty();
                $('#out_dte').empty();
                $('#let_ref_no').empty();
                $('#out_no').empty();
                $('#in_no').empty();
                $('#let_dte').empty();
                $('#sub').empty();
                $('#frm_dpt').empty();
                $('#frm_per_nm').empty();
                $('#frm_plc').empty();
                $('#frm_add').empty();
                $('#cor').empty();
                $('#cor_rec_dte').empty();
                $('#is_ret').empty();
                $('#ret_res').empty();
                $('#recpt_no').empty();
                $('#amt').empty();
                $('#ret_dte').empty();
                $('#desc').empty();
                $('#crtd').empty();
                $('#modf').empty();
            });

        })
    </script>
@endpush

@extends('layouts.master')

@section('content')
    <div class="content-wrapper" style="min-height: 1490.56px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Outward Details
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="breadcrumb-item active">Outward List</li>
            </ol>
        </section>

    @if($outwards->count() >= 1)
        <!-- Main content -->
            <section class="content">

                @if(session('deleteerror'))
                    <div class="callout callout-warning">
                        <p><i class="mdi mdi-alert-circle-outline fa-lg"></i> {{ session('deleteerror') }}</p>
                    </div>
                @endif

                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="mdi mdi-reorder-horizontal fa-lg"></i> OUTWARD LIST PAGE</h3>
                    </div>

                    <div class="box-body">
                        <form class="form" method="POST" action="{{ route('outwardIndex') }}">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="letter-date">From</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control datepicker pull-right" value="{{ $data[1] == '' ? '' : \Carbon\Carbon::parse($data[1])->format('d-m-Y') }}" id="letter-date" name="from_letter_date" placeholder="Select Letter Date" autocomplete="off">

                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="letter-date">To</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control datepicker pull-right" value="{{ $data[2] == '' ? '' : \Carbon\Carbon::parse($data[2])->format('d-m-Y') }}" id="letter-date" name="to_letter_date" placeholder="Select Letter Date" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group col-md-4" id="mode-id">
                                    <label>Select Mode</label>
                                    <select class="form-control select2" name="mode_id" style="width: 100%;">
                                        <option value="">Select One</option>
                                        @foreach ($modes as $id => $name)
                                            <option value="{{ $id }}" {{ $data[3] == $id ? 'selected' : '' }}>{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success btn-sm mb-5">Search</button>
                                    <a href="{{ route('outwardIndex') }}" class="btn btn-default btn-sm mb-5">Clear</a>
                                </div>
                            </div>
                        </form>
                        <hr class="my-15">
                        <div class="row">
                            <div class="col-md-10">
                                <h4 class="box-title"><i class="mdi mdi-file-find fa-lg"></i> Search Result <small>Total ' {{ $outwards->count() }} ' inwards record found</small></h4>
                            </div>
                            <div class="col-md-2 text-right">
                                <a class="btn btn-success btn-sm mb-5" href="{{ route('outwardCreate') }}">
                                    <i class="mdi mdi-plus fa-lg"></i> Add
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">Mode</th>
                                    <th scope="col">Outward No</th>
                                    <th scope="col">Inward No</th>
                                    <th scope="col">Outward Date</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">From Department</th>
                                    <th scope="col">To Person Name</th>
                                    <th scope="col">Is Return</th>
                                    <th scope="col">Modified</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($outwards as $outward)
                                    <tr>
                                        <td>{{ $outward->mode->name }}</td>
                                        <td>{{ $outward->outward_no }}</td>
                                        <td>{{ $outward->inward ==  null ? '' : $outward->inward->inward_no }}</td>
                                        <td>{{ \Carbon\Carbon::parse($outward->outward_date)->format('d-m-Y') }}</td>
                                        <td>{{ str_limit($outward->subject, 20) }}</td>
                                        <td>{{ $outward->department->name }}</td>
                                        <td>{{ $outward->from_details_person_name }}</td>
                                        <td>{{ $outward->courier_details_is_return == 1 ? 'True' : 'False' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($outward->updated_at)->diffForHumans() }}</td>
                                        <td>

                                                <span class="view-record" data-toggle="modal" data-target=".viewOutwardDetails" data-outward-no="{{ $outward->outward_no }}" data-outward-date="{{ \Carbon\Carbon::parse($outward->outward_date)->format('d-m-Y') }}" data-letter-date="{{ \Carbon\Carbon::parse($outward->letter_date)->format('d-m-Y') }}" data-letter-ref-no="{{ $outward->letter_ref_no }}" data-subject="{{ $outward->subject }}" data-from-details-person-name="{{ $outward->from_details_person_name }}" data-to-details-name="{{ $outward->to_details_name }}" data-to-details-place="{{ $outward->to_details_place }}" data-to-details-address="{{ $outward->to_details_address }}" data-courier-details-receipt-no="{{ $outward->courier_details_receipt_no }}" data-courier-details-receipt-date="{{ \Carbon\Carbon::parse($outward->courier_details_receipt_date)->format('d-m-Y') }}" data-courier-details-amount="{{ $outward->courier_details_amount }}" data-courier-details-is-return="{{ $outward->courier_details_is_return == true ? 'Yes' : 'No' }}" data-courier-details-return-date="{{ \Carbon\Carbon::parse($outward->courier_details_return_date)->format('d-m-Y') }}" data-courier-return-reason="{{ $outward->courier_details_return_reason }}" data-courier-description="{{ $outward->courier_details_description }}" data-mode="{{ $outward->mode->name }}" data-inward="{{ $outward->inward == null ? '' : $outward->inward->inward_no }}" data-department="{{ $outward->department->name }}" data-courier="{{ $outward->courier ==  null ? '' : $outward->courier->name }}" data-created="{{ \Carbon\Carbon::parse($outward->created_at)->diffForHumans() }}" data-modified="{{ \Carbon\Carbon::parse($outward->updated_at)->diffForHumans() }}">
                                                    <button class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="View Record"><i class="mdi mdi-content-paste fa-lg" style="color: white"></i></button>
                                                </span>
                                            <a href="{{ route('outwardEdit', $outward->id)}}" class="btn btn-purple btn-xs" data-toggle="tooltip" data-placement="top" title="Edit Record"><i class="mdi mdi-pencil fa-lg"></i></a>
                                            <span class="remove-record" data-toggle="modal" data-target=".deleteConfirm" data-url="{!! URL::route('outwardDelete', $outward->id) !!}" data-outwardid="{{ $outward->id }}">
                                                    <button class="btn btn-danger btn-xs" data-toggle="tooltip" data-placement="top" title="Delete Record"><i class="mdi mdi-delete-empty fa-lg" style="color: white"></i></button>
                                                </span>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->

                    {{--Delete Confirmation Modal--}}
                    @include('outward.delete')
                    {{--View Single Record Modal--}}
                    @include('outward.single')

                </div>
            </section>
            <!-- /.content -->
    @else
        <!-- Main content -->
            <section class="content">

                <div class="callout callout-primary">
                    <p><i class="mdi mdi-alert-circle-outline fa-lg"></i> No Data Found</p>
                </div>

                <!-- Default box -->
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"><i class="mdi mdi-reorder-horizontal fa-lg"></i> OUTWARD LIST PAGE</h3>
                    </div>

                    <div class="box-body">
                        <form class="form" method="POST" action="{{ route('outwardIndex') }}">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="letter-date">From</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control datepicker pull-right" value="{{ $data[1] == '' ? '' : \Carbon\Carbon::parse($data[1])->format('d-m-Y') }}" id="letter-date" name="from_letter_date" placeholder="Select Letter Date" autocomplete="off">

                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="letter-date">To</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control datepicker pull-right" value="{{ $data[2] == '' ? '' : \Carbon\Carbon::parse($data[2])->format('d-m-Y') }}" id="letter-date" name="to_letter_date" placeholder="Select Letter Date" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group col-md-4" id="mode-id">
                                    <label>Select Mode</label>
                                    <select class="form-control select2" name="mode_id" style="width: 100%;">
                                        <option value="">Select One</option>
                                        @foreach ($modes as $id => $name)
                                            <option value="{{ $id }}" {{ $data[3] == $id ? 'selected' : '' }}>{{ $name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success btn-sm mb-5">Search</button>
                                    <a href="{{ route('outwardIndex') }}" class="btn btn-default btn-sm mb-5">Clear</a>
                                </div>
                            </div>
                        </form>
                        <hr class="my-15">
                        <div class="row">
                            <div class="col-md-10">
                                <h4 class="box-title"><i class="mdi mdi-file-find fa-lg"></i> Search Result <small>No Data Found</small></h4>
                            </div>
                            <div class="col-md-2 text-right">
                                <a class="btn btn-success btn-sm mb-5" href="{{ route('outwardCreate') }}">
                                    <i class="mdi mdi-plus fa-lg"></i> Add
                                </a>
                            </div>


                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </section>
            <!-- /.content -->
        @endif







    </div>


    </div>
@endsection