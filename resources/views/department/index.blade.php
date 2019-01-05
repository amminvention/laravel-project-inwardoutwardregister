@section('title')Department | @endsection
@push('scripts')
    <script>
        $( document ).ready(function () {
            $('.remove-record').click(function() {
                var id = $(this).attr('data-departmentid');
                var url = $(this).attr('data-url');
                $(".remove-record-model").attr("action",url);
                $('body').find('.remove-record-model').append('<input name="id" type="hidden" value="'+ id +'">');
            });

            $('.remove-data-from-delete-form').click(function() {
                $('body').find('.remove-record-model').find( "input" ).remove();
            });

            $('.view-record').click(function() {
                var id = $(this).attr('data-departmentid');
                var name = $(this).attr('data-name');
                var remarks = $(this).attr('data-remarks');
                var modified = $(this).attr('data-modified');
                var created = $(this).attr('data-created');

                $('#id').text(id);
                $('#dn').text(name);
                $('#remks').text(remarks);
                $('#crtd').text(created);
                $('#modf').text(modified);

            });

            $('.remove-data-from-view-form').click(function() {
                $('#id').empty();
                $('#dn').empty();
                $('#remks').empty();
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
                Department
            </h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="breadcrumb-item active">Department List</li>
            </ol>
        </section>

    @if($departments->count() >= 1)
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
                        <h3 class="box-title"><i class="mdi mdi-reorder-horizontal fa-lg"></i> DEPARTMENT LIST PAGE</h3>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-10">
                                <h4 class="box-title"><i class="mdi mdi-file-find fa-lg"></i> Search Result <small>Total ' {{ $departments->count() }} ' departments found</small></h4>
                            </div>
                            <div class="col-md-2 text-right">
                                <a class="btn btn-success btn-sm mb-5" href="{{ route('departmentCreate') }}">
                                    <i class="mdi mdi-plus fa-lg"></i> Add
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">Department</th>
                                    <th scope="col">Remarks</th>
                                    <th scope="col">Modified</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($departments as $department)
                                    <tr>
                                        <th scope="row">{{ $department->name }}</th>
                                        <td>{{ str_limit($department->remarks, 20) }}</td>
                                        <td>{{ \Carbon\Carbon::parse($department->updated_at)->diffForHumans() }}</td>
                                        <td>

                                                <span class="view-record" data-toggle="modal" data-target=".viewDepartmentDetails" data-departmentid="{{ $department->id }}" data-name="{{ $department->name }}" data-remarks="{{ $department->remarks }}" data-created="{{ \Carbon\Carbon::parse($department->created_at)->diffForHumans() }}" data-modified="{{ \Carbon\Carbon::parse($department->updated_at)->diffForHumans() }}">
                                                    <button class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="View Record"><i class="mdi mdi-content-paste fa-lg" style="color: white"></i></button>
                                                </span>
                                            <a href="{{ route('departmentEdit', $department->id)}}" class="btn btn-purple btn-xs" data-toggle="tooltip" data-placement="top" title="Edit Record"><i class="mdi mdi-pencil fa-lg"></i></a>
                                            <span class="remove-record" data-toggle="modal" data-target=".deleteConfirm" data-url="{!! URL::route('departmentDelete', $department->id) !!}" data-departmentid="{{ $department->id }}">
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

                    {{-- Delete Confirmation Modal --}}
                    @include('department.delete')
                    {{--View Single Record Modal--}}
                    @include('department.single')

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
                        <h3 class="box-title"><i class="mdi mdi-reorder-horizontal fa-lg"></i> DEPARTMENT LIST PAGE</h3>
                    </div>

                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-10">
                                <h4 class="box-title"><i class="mdi mdi-file-find fa-lg"></i> Search Result <small>No Data Found</small></h4>
                            </div>
                            <div class="col-md-2 text-right">
                                <a class="btn btn-success btn-sm mb-5" href="{{ route('departmentCreate') }}">
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