@extends('dashboard.layouts.master')
@section('title')
    Add User
@endsection
@section('content')
    <!---- page header -- -- -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class=" px-3 py-3">
                    <div class="row justify-content-between ">
                        <div class="align-items-center col">
                            <h4>Add New User</h4>
                        </div>
                        <div class="align-items-center col">
                            <div class="float-end m-0">
                                <span><a href="{{ route('home') }}" style="color: #007bff">Home</a> /
                                    <span>Add User</span></span>
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
            <a href="{{ route('user.view') }}" class="btn btn-success float-end">All User</a>
            <div class="mainForm">
                <div class="row">
                    <div class="col-12 col-md-8 p-1">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('update.user',$data->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="inputEmail" class="form-label">User Name *</label>
                                        <input type="text" id="name" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Enter Your First Name" value="{{ old('name', $data->name) }}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    {{-- email address  --}}
                                    <div class="mb-3">
                                        <label for="inputEmail" class="form-label">Email address *</label>
                                        <input type="email" id="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="Enter Your Email" value="{{ old('email', $data->email) }}">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="inputEmail" class="form-label">Mobile Number *</label>
                                        <input type="text" id="number" name="number"
                                            class="form-control @error('number') is-invalid @enderror"
                                            placeholder="Enter Your Phone Number" value="{{ old('number', $data->number) }}">
                                        @error('number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    {{-- password  --}}
                                    <div class="mb-3">
                                        <label for="inputPassword" class="form-label">Password *</label>
                                        <input type="password" id="password" name="password"
                                            class="form-control @error('password') is-invalid @enderror" id="inputPassword"
                                            placeholder="Password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    {{-- user type  --}}
                                    <label class="form-label">User Type *</label>
                                    <select name="user_type" class="form-control @error('user_type') is-invalid @enderror">
                                        <option value="{{$data->user_type}}">{{$data->user_type}}</option>
                                        <option value="admin" >admin </option>
                                        <option value="manager">manager</option>
                                        <option value="editor" >editor</option>
                                    </select>
                                    @error('user_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    {{-- img --}}
                                    <div class="mb-3">
                                        <label for="img" class="form-label">Image</label>
                                        <input type="file" id="img" name="img"
                                            class="form-control @error('img') is-invalid @enderror">
                                        @error('img')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        <img src="{{ asset('image/user') }}/{{ $data->img }}" alt="User Img"
                                            class="rounded" width="80">
                                    </div> <br>

                                    <button type="submit" class="btn btn-primary d-block w-100 mb-3">Singup</button>
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
