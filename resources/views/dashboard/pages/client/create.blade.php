@extends('dashboard.layouts.master')
@section('title')
    Add Client
@endsection
@section('content')
    <!---- page header -- -- -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class=" px-3 py-3">
                    <div class="row justify-content-between ">
                        <div class="align-items-center col">
                            <h4>Add New Client</h4>
                        </div>
                        <div class="align-items-center col">
                            <div class="float-end m-0">
                                <span><a href="{{ route('home') }}" style="color: #007bff">Home</a> /
                                    <span>Add Client</span></span>
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
            <a href="{{ url('dashboard/client') }}" class="btn btn-success float-end">Back</a>
            <div class="mainForm">
                <div class="row">
                    <div class="col-12 col-md-8 p-1">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ url('dashboard/client') }}" enctype="multipart/form-data">
                                    @csrf


                                    {{-- name --}}
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Client Name *</label>
                                        <input type="text" id="name" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Enter Client Name" value="{{ old('name') }}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            {{-- email  --}}
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Client Email *</label>
                                                <input type="text" id="email" name="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    placeholder="Enter Client Email" value="{{ old('email') }}">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            {{-- phone number  --}}
                                            <div class="mb-3">
                                                <label for="phone" class="form-label">Phone Number *</label>
                                                <input type="phone" id="phone" name="phone"
                                                    class="form-control @error('phone') is-invalid @enderror"
                                                    placeholder="Enter Client phone" value="{{ old('phone') }}">
                                                @error('phone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                    {{-- address  --}}
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Address *</label>
                                        <textarea id="address" name="address" class="form-control @error('address') is-invalid @enderror"
                                            placeholder="Enter your address">{{ old('address') }}</textarea>
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                    {{-- gender --}}
                                    <div class="mb-3">
                                        <label for="gender" class="form-label">Gender *</label>
                                        <select id="gender" name="gender"
                                            class="form-select @error('gender') is-invalid @enderror">
                                            <option value="">Select Gender</option>
                                            <option value="male" @if (old('gender') == 'male') selected @endif>Male
                                            </option>
                                            <option value="female" @if (old('gender') == 'female') selected @endif>
                                                Female
                                            </option>
                                            <option value="other" @if (old('gender') == 'other') selected @endif>Other
                                            </option>
                                        </select>
                                        @error('gender')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    {{-- note --}}
                                    <div class="mb-3">
                                        <label for="note" class="form-label">Note</label>
                                        <textarea id="note" name="note" class="form-control @error('note') is-invalid @enderror"
                                            placeholder="Enter your note">{{ old('note') }}</textarea>
                                        @error('note')
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
                                    </div> <br>

                                    <button type="submit" class="btn btn-primary d-block w-100 mb-3">Submit</button>
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
