@extends('layouts.master')
@section('title')Dashboard | @endsection
@section('content')
    <div class="content-wrapper" style="min-height: 1490.56px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-dashboard"></i> Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="mdi mdi-account"></i> Welcome to Admin Panel</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-xl-6 col-md-6 col-6">
                            <!-- small box -->
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h3>{{ $inwards }}</h3>

                                    <p>Total Inwards</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-sign-in"></i>
                                </div>
                                <a href="{{ route('inwardIndex') }}" class="small-box-footer">INWARDS <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>

                        <div class="col-xl-6 col-md-6 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{ $outwards }}</h3>

                                    <p>Total Outwards</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-sign-out"></i>
                                </div>
                                <a href="{{ route('outwardIndex') }}" class="small-box-footer">OUTWARDS <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="box-title"><i class="mdi mdi-file-find fa-lg"></i> <span class="text-danger">TRACK INWARDS</span> <small>by Inward number...</small></h4>
                            <hr class="my-15">
                            <div class="box-body">

                                <div class="row">
                                    <form class="form" action="{{ route('dashboard') }}" method="POST">
                                        @csrf
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label for="inward-no" class="col-md-12 col-sm-12 col-form-label col-xl-4 text-xl-right text-sm-left text-md-left"><span class="text-danger">*</span> Inward No</label>
                                                <div class="col-md-12 col-sm-12 col-xl-6">
                                                    <input class="form-control{{ $errors->has('inward_no') ? ' is-invalid' : '' }}" type="text" value="{{ $data[1] }}" id="inward-no" name="inward_no" placeholder="Enter Inward No">
                                                    @if ($errors->has('inward_no'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('inward_no') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xl-2">
                                                    <button type="submit" class="btn btn-success" style="padding: 0.425rem 0.9rem;">Track</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    @if(!empty($inwardsSearch))
                                    @push('css')
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
                                        <script>
                                            $( document ).ready(function () {

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
                                    <div class="col-md-12 pl-0 pr-0">
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <thead class="thead-light">
                                                <tr>
                                                    <th scope="col">Inward No</th>
                                                    <th scope="col">Inward Date</th>
                                                    <th scope="col">From</th>
                                                    <th scope="col">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($inwardsSearch as $inward)
                                                <tr>
                                                    <td>{{ $inward->inward_no }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($inward->inward_date)->format('d-m-Y') }}</td>
                                                    <td>{{ $inward->from_details_name }}</td>
                                                    <td>
                                                        <span class="view-record" data-toggle="modal" data-target=".viewInwardDetails" data-inwardid="{{ $inward->id }}" data-inward-no="{{ $inward->inward_no }}" data-inward-date="{{ \Carbon\Carbon::parse($inward->inward_date)->format('d-m-Y') }}" data-receive-date="{{ \Carbon\Carbon::parse($inward->receive_date)->format('d-m-Y') }}" data-letter-date="{{ \Carbon\Carbon::parse($inward->letter_date)->format('d-m-Y') }}" data-letter-ref-no="{{ $inward->letter_ref_no }}" data-subject="{{ $inward->subject }}" data-from-details-name="{{ $inward->from_details_name }}" data-from-details-address="{{ $inward->from_details_address }}" data-to-details-person-name="{{ $inward->to_details_person_name }}" data-courier-details-courier-name="{{ $inward->courier_details_courier_name }}" data-courier-details-description="{{ $inward->courier_details_description }}" data-mode="{{ $inward->mode->name }}" data-outward="{{ $inward->outward_no }}" data-department="{{ $inward->department->name }}" data-courier="{{ $inward->courier ==  null ? '' : $inward->courier->name }}" data-created="{{ \Carbon\Carbon::parse($inward->created_at)->diffForHumans() }}" data-modified="{{ \Carbon\Carbon::parse($inward->updated_at)->diffForHumans() }}">
                                                            <button class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="View Record"><i class="mdi mdi-content-paste fa-lg" style="color: white"></i></button>
                                                        </span>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    @include('inward.single')
                                    @endif
                                </div>

                            </div>
                            <!-- /.box-body -->
                        </div>
                        <div class="col-md-6">
                            <h4 class="box-title"><i class="mdi mdi-file-find fa-lg"></i> <span class="text-danger">TRACK INWARDS</span> <small>by Outward number...</small></h4>
                            <hr class="my-15">
                            <div class="box-body">
                                <div class="row">
                                    <form action="{{ route('dashboard') }}" method="POST">
                                        @csrf
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <label for="onward-no" class="col-md-12 col-sm-12 col-form-label col-xl-4 text-xl-right text-sm-left text-md-left"><span class="text-danger">*</span> Outward No</label>
                                                <div class="col-md-12 col-sm-12 col-xl-6">
                                                    <input class="form-control{{ $errors->has('outward_no') ? ' is-invalid' : '' }}" type="text" value="{{ $data[2] }}" id="onward-no" name="outward_no" placeholder="Enter Outward No">
                                                    @if ($errors->has('outward_no'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('outward_no') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xl-2">
                                                    <button type="submit" class="btn btn-success" style="padding: 0.425rem 0.9rem;">Track</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    @if(!empty($outwardsSearch))
                                        @push('css')
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
                                            <script>
                                                $( document ).ready(function () {

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
                                        <div class="col-md-12 pl-0 pr-0">
                                            <div class="table-responsive">
                                                <table class="table mb-0">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th scope="col">Outward No</th>
                                                        <th scope="col">Outward Date</th>
                                                        <th scope="col">To</th>
                                                        <th scope="col">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($outwardsSearch as $outward)
                                                        <tr>
                                                            <td>{{ $outward->outward_no }}</td>
                                                            <td>{{ \Carbon\Carbon::parse($outward->outward_date)->format('d-m-Y') }}</td>
                                                            <td>{{ $outward->from_details_person_name }}</td>
                                                            <td>
                                                                <span class="view-record" data-toggle="modal" data-target=".viewOutwardDetails" data-outward-no="{{ $outward->outward_no }}" data-outward-date="{{ \Carbon\Carbon::parse($outward->outward_date)->format('d-m-Y') }}" data-letter-date="{{ \Carbon\Carbon::parse($outward->letter_date)->format('d-m-Y') }}" data-letter-ref-no="{{ $outward->letter_ref_no }}" data-subject="{{ $outward->subject }}" data-from-details-person-name="{{ $outward->from_details_person_name }}" data-to-details-name="{{ $outward->to_details_name }}" data-to-details-place="{{ $outward->to_details_place }}" data-to-details-address="{{ $outward->to_details_address }}" data-courier-details-receipt-no="{{ $outward->courier_details_receipt_no }}" data-courier-details-receipt-date="{{ \Carbon\Carbon::parse($outward->courier_details_receipt_date)->format('d-m-Y') }}" data-courier-details-amount="{{ $outward->courier_details_amount }}" data-courier-details-is-return="{{ $outward->courier_details_is_return == true ? 'Yes' : 'No' }}" data-courier-details-return-date="{{ \Carbon\Carbon::parse($outward->courier_details_return_date)->format('d-m-Y') }}" data-courier-return-reason="{{ $outward->courier_details_return_reason }}" data-courier-description="{{ $outward->courier_details_description }}" data-mode="{{ $outward->mode->name }}" data-inward="{{ $outward->inward == null ? '' : $outward->inward->inward_no }}" data-department="{{ $outward->department->name }}" data-courier="{{ $outward->courier ==  null ? '' : $outward->courier->name }}" data-created="{{ \Carbon\Carbon::parse($outward->created_at)->diffForHumans() }}" data-modified="{{ \Carbon\Carbon::parse($outward->updated_at)->diffForHumans() }}">
                                                                    <button class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="View Record"><i class="mdi mdi-content-paste fa-lg" style="color: white"></i></button>
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        @include('outward.single')
                                    @endif
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>

                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection
