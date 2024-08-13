@extends('layouts.master')

@section('title', 'Default')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatable-extension.css') }}">
@endsection
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Incidents Response</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Dashboard</li>
    <li class="breadcrumb-item">Incident Response</li>
@endsection

@section('content')
<div class="row">
    <!-- Left Column - Add Form -->
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
            <a href="{{ route('emergencyreport.show') }}" class="btn btn-primary">View Recent Report</a>
                <h5>Add Incident</h5>
            </div>
            <div class="card-body">
            <form method="post" action="https://emergency.rkiveadmin.com/public/api/incidentsresponse" enctype="multipart/form-data">
                  
                 <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label" for="owner">Owner</label>
                            <input class="form-control" id="owner" type="text" placeholder="Owner" name="owner" required="" >
                            <div class="invalid-feedback">Please provide the owner.</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="title">Title</label>
                            <input class="form-control" id="title" type="text" placeholder="Title" name="title" required="">
                            <div class="invalid-feedback">Please provide the title.</div>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="description">Description</label>
                            <textarea class="form-control" id="description" placeholder="Description" name="description"  required=""></textarea>
                            <div class="invalid-feedback">Please provide the description.</div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="importance">Importance</label>
                            <select class="form-select" id="importance" name="importance" required="">
                                <option value="" selected disabled>Select Importance</option>
                                <option value="Low">Low</option>
                                <option value="Medium">Mid</option>
                                <option value="High">High</option>
                            </select>
                            <div class="invalid-feedback">Please provide the importance.</div>
                        </div>
                
                        
                        
                        
                  
                </div>

                    <br>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')
<script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/jszip.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.autoFill.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.select.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.colReorder.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.fixedHeader.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.rowReorder.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/dataTables.scroller.min.js') }}"></script>
<script src="{{ asset('assets/js/datatable/datatable-extension/custom.js') }}"></script>
@endsection
