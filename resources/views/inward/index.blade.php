@section('title')Inward | @endsection
@push('css')
    <!-- daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/vendor_components/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/vendor_components/select2/select2.min.css') }}">
    <style>
        .inward-table>tbody>tr>td, .inward-table>tbody>tr>th, .inward-table>tfoot>tr>td, .inward-table>tfoot>tr>th, .inward-table>thead>tr>td, .inward-table>thead>tr>th{
            border-top: 0 solid white;
            line-height: .5;
        }
        .inward-tab-space>tbody>tr>td {
            padding-left: 0;
        }
        .inward-tab-space>tbody>tr>th {
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
                var id = $(this).attr('data-inwardid');
                var url = $(this).attr('data-url');
                $(".remove-record-model").attr("action",url);
                $('body').find('.remove-record-model').append('<input name="id" type="hidden" value="'+ id +'">');
            });

            $('.remove-data-from-delete-form').click(function() {
                $('body').find('.remove-record-model').find( "input" ).remove();
            });

            $('.view-record').click(function() {

                var id = $(this).attr('data-inwardid');
                var in_no = $(this).attr('data-inward-no');
                var in_dte = $(this).attr('data-inward-date');
                var rec_dte = $(this).attr('data-receive-date');
                var let_dte = $(this).attr('data-letter-date');
                var let_no = $(this).attr('data-letter-ref-no');
                var sub = $(this).attr('data-subject');
                var frm_nm = $(this).attr('data-from-details-name');
                var frm_add = $(this).attr('data-from-details-address');
                var per_nm = $(this).attr('data-to-details-person-name');
                //var cor = $(this).attr('data-courier-details-courier-name');
                var desc = $(this).attr('data-courier-details-description');
                var in_mod_nm = $(this).attr('data-mode');
                var out_no = $(this).attr('data-outward');
                var dept = $(this).attr('data-department');
                var cor = $(this).attr('data-courier');
                var crtd = $(this).attr('data-created');
                var modf = $(this).attr('data-modified');

                $('#id').text(id);
                $('#in_no').text(in_no);
                $('#in_dte').text(in_dte);
                $('#rec_dte').text(rec_dte);
                $('#let_dte').text(let_dte);
                $('#let_no').text(let_no);
                $('#sub').text(sub);
                $('#frm_nm').text(frm_nm);
                $('#frm_add').text(frm_add);
                $('#per_nm').text(per_nm);
                $('#desc').text(desc);
                $('#in_mod_nm').text(in_mod_nm);
                $('#out_no').text(out_no);
                $('#dept').text(dept);
                $('#cor').text(cor);
                $('#crtd').text(crtd);
                $('#modf').text(modf);

            });

            $('.remove-data-from-view-form').click(function() {
                $('#id').empty();
                $('#in_no').empty();
                $('#in_dte').empty();
                $('#rec_dte').empty();
                $('#let_dte').empty();
                $('#let_no').empty();
                $('#sub').empty();
                $('#frm_nm').empty();
                $('#frm_add').empty();
                $('#per_nm').empty();
                $('#desc').empty();
                $('#in_mod_nm').empty();
                $('#out_no').empty();
                $('#dept').empty();
                $('#cor').empty();
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
                Inward Details
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="breadcrumb-item active">Inward List</li>
            </ol>
        </section>

    @if($inwards->count() >= 1)
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
                        <h3 class="box-title"><i class="mdi mdi-reorder-horizontal fa-lg"></i> INWARD LIST PAGE</h3>
                    </div>

                    <div class="box-body">
                        <form class="form" method="POST" action="{{ route('inwardIndex') }}">
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
                                    <a href="{{ route('inwardIndex') }}" class="btn btn-default btn-sm mb-5">Clear</a>
                                </div>
                            </div>
                        </form>
                        <hr class="my-15">

                        <div class="row">
                            <div class="col-md-10">
                                <h4 class="box-title"><i class="mdi mdi-file-find fa-lg"></i> Search Result <small>Total ' {{ $inwards->count() }} ' inwards record found</small></h4>
                            </div>
                            <div class="col-md-2 text-right">
                                <a class="btn btn-success btn-sm mb-5" href="{{ route('inwardCreate') }}">
                                    <i class="mdi mdi-plus fa-lg"></i> Add
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">Mode</th>
                                    <th scope="col">Inward No</th>
                                    <th scope="col">Outward No</th>
                                    <th scope="col">Inward Date</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">From Name</th>
                                    <th scope="col">To Department</th>
                                    <th scope="col">Modified</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($inwards as $inward)
                                    <tr>
                                        <td>{{ $inward->mode->name }}</td>
                                        <td>{{ $inward->inward_no }}</td>
                                        <td>{{ $inward->outward == null ? '' : $inward->outward->outward_no }}</td>
                                        <td>{{ \Carbon\Carbon::parse($inward->inward_date)->format('d-m-Y') }}</td>
                                        <td>{{ str_limit($inward->subject, 20) }}</td>
                                        <td>{{ $inward->from_details_name }}</td>
                                        <td>{{ $inward->department->name }}</td>
                                        <td>{{ \Carbon\Carbon::parse($inward->updated_at)->diffForHumans() }}</td>
                                        <td>

                                                <span class="view-record" data-toggle="modal" data-target=".viewInwardDetails" data-inwardid="{{ $inward->id }}" data-inward-no="{{ $inward->inward_no }}" data-inward-date="{{ \Carbon\Carbon::parse($inward->inward_date)->format('d-m-Y') }}" data-receive-date="{{ \Carbon\Carbon::parse($inward->receive_date)->format('d-m-Y') }}" data-letter-date="{{ \Carbon\Carbon::parse($inward->letter_date)->format('d-m-Y') }}" data-letter-ref-no="{{ $inward->letter_ref_no }}" data-subject="{{ $inward->subject }}" data-from-details-name="{{ $inward->from_details_name }}" data-from-details-address="{{ $inward->from_details_address }}" data-to-details-person-name="{{ $inward->to_details_person_name }}" data-courier-details-courier-name="{{ $inward->courier_details_courier_name }}" data-courier-details-description="{{ $inward->courier_details_description }}" data-mode="{{ $inward->mode->name }}" data-outward="{{ $inward->outward_no }}" data-department="{{ $inward->department->name }}" data-courier="{{ $inward->courier ==  null ? '' : $inward->courier->name }}" data-created="{{ \Carbon\Carbon::parse($inward->created_at)->diffForHumans() }}" data-modified="{{ \Carbon\Carbon::parse($inward->updated_at)->diffForHumans() }}">
                                                    <button class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="View Record"><i class="mdi mdi-content-paste fa-lg" style="color: white"></i></button>
                                                </span>
                                            <a href="{{ route('inwardEdit', $inward->id)}}" class="btn btn-purple btn-xs" data-toggle="tooltip" data-placement="top" title="Edit Record"><i class="mdi mdi-pencil fa-lg"></i></a>
                                            <span class="remove-record" data-toggle="modal" data-target=".deleteConfirm" data-url="{!! URL::route('inwardDelete', $inward->id) !!}" data-inwardid="{{ $inward->id }}">
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
                    @include('inward.delete')
                    {{--View Single Record Modal--}}
                    @include('inward.single')

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
                        <h3 class="box-title"><i class="mdi mdi-reorder-horizontal fa-lg"></i> INWARD LIST PAGE</h3>
                    </div>

                    <div class="box-body">
                        <form class="form" method="POST" action="{{ route('inwardIndex') }}">
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
                                    <a href="{{ route('inwardIndex') }}" class="btn btn-default btn-sm mb-5">Clear</a>
                                </div>
                            </div>
                        </form>
                        <hr class="my-15">
                        <div class="row">
                            <div class="col-md-10">
                                <h4 class="box-title"><i class="mdi mdi-file-find fa-lg"></i> Search Result <small>No Data Found</small></h4>
                            </div>
                            <div class="col-md-2 text-right">
                                <a class="btn btn-success btn-sm mb-5" href="{{ route('inwardCreate') }}">
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