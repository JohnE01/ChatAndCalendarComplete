@extends('layouts.master')

@section('title', 'Default')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/prism.css') }}">
@endsection

<title>Create Ticket</title>
@section('content')


<nav class="navbar navbar-light bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand"></a>
      <form action="{{ url('track-ticket') }}" method="POST" class="d-flex input-group w-auto">
        @csrf
        <input
          type="search"
          name="track"
          class="form-control rounded"
          placeholder="Track your ticket here"
          aria-label="Search"
          aria-describedby="search-addon"
        />
      </form>
    </div>
  </nav>
<div class="content col-sm-12 d-flex justify-content-center align-items-center " style="margin-top: 5vh;">
    <div class="card">
    <div class="header-logo-wrapper col-auto p-0">
      <div class="logo-wrapper"><a href="{{ route('index')}}"><img class="img-fluid" src="{{ asset('assets/images/logo/logo.png') }}" alt=""></a></div>
            <h5>Helpdesk & Support</h5><span>How can we help you?<a href="#"></a> Create your Ticket now. </span>
        </div>
        <div class="card-body">
            <form class="theme-form" action="{{ url('submit-ticket') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">Name</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="inputEmail3" type="text" placeholder="Name" name="name">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">Email</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="inputEmail3" type="email" placeholder="Email" name="email">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">Company</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="inputEmail3" type="text" placeholder="Company (Optional)" name="company">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label" for="inputEmail3">Department</label>
                    <div class="col-sm-9">
                        <input class="form-control" id="inputEmail3" type="text" placeholder="Department (Optional)" name="department">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Concern</label>
                    <div class="col-sm-9">
                        <textarea class="form-control" rows="5" cols="5" name="concern" placeholder="Enter Concern"></textarea>
                    </div>
                </div>
                <fieldset class="mb-3">
                    <div class="row">
                        <label class="col-form-label col-sm-3 pt-0">Priority Level</label>
                        <div class="col-sm-9">
                            <div class="form-check radio radio-success">
                                <input class="form-check-input" id="radio11" type="radio" name="priority" value="Low">
                                <label class="form-check-label" for="radio11">Low / Minor Issues</label>
                            </div>
                            <div class="form-check radio radio-warning">
                                <input class="form-check-input" id="radio22" type="radio" name="priority" value="Medium">
                                <label class="form-check-label" for="radio22">Medium / Urgent Issues</label>
                            </div>
                            <div class="form-check radio radio-danger">
                                <input class="form-check-input" id="radio33" type="radio" name="priority" value="High">
                                <label class="form-check-label" for="radio33">High / Critical Issues</label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="row">
				<div class="col">
				  <div class="mb-3 row">
					<label class="col-sm-3 col-form-label">Attachments</label>
					<div class="col-sm-9">
					  <input class="form-control" type="file" name="attachments[]" multiple>
					</div>
				  </div>
				</div>
			  </div>
              
        </div>
        <div class="card-footer text-end">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button class="btn btn-secondary">Cancel</button>
        </div>
        </form>
    </div>
</div>
</div>
@endsection

https://helpdesk.rkiveadmin.com/ticket-form