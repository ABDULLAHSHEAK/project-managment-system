@extends('dashboard.layouts.master')
@section('title')
    User Profile
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class=" px-3 py-3">
                    <div class="row justify-content-between ">
                        <div class="align-items-center col">
                            <h4>Profile</h4>
                        </div>
                        <div class="align-items-center col">
                            <div class="float-end m-0">
                                <span><a href="index.html" style="color: #007bff">Home</a> /
                                    <span>Profile</span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>

        </div>
    </div>
    <hr>

    <!-- ------- main content --------  -->
    <div class="container-fluid">
        <div class="row">
            <div class="mainForm">
                <div class="row">
                    <div class="col-12 col-md-8 p-1">
                        <div class="card">
                            <div class="card-body">
                                <form action="">

                                    <label class="form-label"> Name</label>
                                    <input disabled value="{{ $data->name }}" type="text" class="form-control" required>

                                    <label class="form-label">User Email</label>
                                    <input disabled value="{{ $data->email }}" type="email" class="form-control" required>

                                    <label class="form-label">User Mobile</label>
                                    <input disabled value="{{ $data->number }}" type="text" class="form-control" required>

                                    <label class="form-label">User Password</label>
                                    <input disabled value="{{ $data->password }}" type="password" class="form-control" required>

                                    <label class="form-label">User Type</label>
                                    <select disabled name="" class="form-control">
                                        <option value="{{ $data->user_type }}">{{ $data->user_type }}</option>
                                        <option value="admin">admin</option>
                                        <option value="manager">manager</option>
                                        <option value="editor">editor</option>
                                    </select> <br>

                                    <br>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>
    <hr>
@endsection
