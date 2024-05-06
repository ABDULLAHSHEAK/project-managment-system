@extends('dashboard.layouts.master')
@section('title')
    Add Member
@endsection
@section('content')
    <!---- page header -- -- -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class=" px-3 py-3">
                    <div class="row justify-content-between ">
                        <div class="align-items-center col">
                            <h4>Add New Member</h4>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                        </div>
                        <div class="align-items-center col">
                            <div class="float-end m-0">
                                <span><a href="{{ route('home') }}" style="color: #007bff">Home</a> /
                                    <span>Add Member</span></span>
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
            <a href="{{ url('dashboard/member') }}" class="btn btn-success float-end">All Member</a>
            <div class="mainForm">
                <div class="row">
                    <div class="col-12 col-md-8 p-1">
                        <div class="card">
                            {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}

                            <div class="card-body">
                                <form method="POST" action="{{ url('dashboard/member') }}" enctype="multipart/form-data">
                                    @csrf

                                    {{-- name --}}
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Member Name *</label>
                                        <input type="text" id="name" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Enter Member Name" value="{{ old('name') }}">
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
                                                <label for="email" class="form-label">Member Email *</label>
                                                <input type="text" id="email" name="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    placeholder="Enter Member Email" value="{{ old('email') }}">
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
                                                    placeholder="Enter Your phone" value="{{ old('phone') }}">
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
                                        <label for="address" class="form-label">Address</label>
                                        <textarea id="address" name="address" class="form-control @error('address') is-invalid @enderror"
                                            placeholder="Enter Member address">{{ old('address') }}</textarea>
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    {{-- join_date --}}
                                    <div class="row">
                                        <div class="col-md-6 col-12">

                                            <div class="mb-3">
                                                <label for="join_date" class="form-label">Join Date *</label>
                                                <input type="date" id="join_date" name="join_date"
                                                    class="form-control @error('join_date') is-invalid @enderror"
                                                    placeholder="Enter your join_date" value="{{ old('join_date') }}">
                                                @error('join_date')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            {{-- age --}}
                                            <div class="mb-3">
                                                <label for="age" class="form-label">Age (Year)*</label>
                                                <input type="number" id="age" name="age"
                                                    class="form-control @error('age') is-invalid @enderror"
                                                    placeholder="Enter Member age" value="{{ old('age') }}">
                                                @error('age')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    {{-- join date & age  --}}

                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            {{-- package_id --}}
                                            <div class="mb-3">
                                                <label for="package_id" class="form-label">Package *</label>
                                                <select id="package_id" name="package_id"
                                                    class="form-select @error('package_id') is-invalid @enderror">
                                                    <option value="">Select Package</option>
                                                    @foreach ($packages as $package)
                                                        <option value="{{ $package->id }}"
                                                            {{ old('package_id') == $package->id ? 'selected' : '' }}>
                                                            {{ $package->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('package_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            {{-- shift_id --}}
                                            <div class="mb-3">
                                                <label for="shift_id" class="form-label">Shift *</label>
                                                <select id="shift_id" name="shift_id"
                                                    class="form-select @error('shift_id') is-invalid @enderror">
                                                    <option value="">Select Shift</option>
                                                    @foreach ($shifts as $shift)
                                                        <option value="{{ $shift->id }}"
                                                            {{ old('shift_id') == $shift->id ? 'selected' : '' }}>
                                                            {{ $shift->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('shift_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    {{-- note --}}
                                    <div class="mb-3">
                                        <label for="note" class="form-label">Note (Optional)</label>
                                        <textarea id="note" name="note" class="form-control @error('note') is-invalid @enderror"
                                            placeholder="Enter Note About Member ">{{ old('note') }}</textarea>
                                        @error('note')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    {{-- ----- status --  --}}
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Member Status *</label>
                                        <select id="status" name="status"
                                            class="form-select @error('status') is-invalid @enderror">
                                            <option value="">Select Status</option>
                                            <option value="running" @if (old('status') == 'running') selected @endif>
                                                running
                                            </option>
                                            <option value="complete" @if (old('status') == 'complete') selected @endif>
                                                complete
                                            </option>
                                        </select>
                                        @error('status')
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

                                    {{-- Health section  --}}

                                    <label class="form-label">Member Health Checkup</label>
                                    <hr>

                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-3">
                                                <label for="bp" class="form-label">Blood Pressure (BP) *</label>
                                                <input type="text" id="bp" name="bp"
                                                    class="form-control @error('bp') is-invalid @enderror"
                                                    placeholder="Enter Member Blood Pressure"
                                                    value="{{ old('bp') }}">
                                                @error('bp')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-3">
                                                <label for="diabetes" class="form-label">Diabetes (Blood Sugar Levels)
                                                    *</label>
                                                <input type="text" id="diabetes" name="diabetes"
                                                    class="form-control @error('diabetes') is-invalid @enderror"
                                                    placeholder="Enter Member Diabetes Status"
                                                    value="{{ old('diabetes') }}">
                                                @error('diabetes')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    {{-- ---------  --}}
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-3">
                                                <label for="weight" class="form-label">Member Weight *</label>
                                                <input type="text" id="weight" name="weight"
                                                    class="form-control @error('weight') is-invalid @enderror"
                                                    placeholder="Enter Member Weight" value="{{ old('weight') }}">
                                                @error('weight')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-3">
                                                <label for="height" class="form-label">Member Height *</label>
                                                <input type="text" id="height" name="height"
                                                    class="form-control @error('height') is-invalid @enderror"
                                                    placeholder="Enter Member Height" value="{{ old('height') }}">
                                                @error('height')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    {{-- blood group  --}}
                                    <div class="mb-3">
                                        <label for="blood" class="form-label">Blood Type *</label>
                                        <select id="blood" name="blood"
                                            class="form-select @error('blood') is-invalid @enderror">
                                            <option value="">Select Blood Type</option>
                                            <option value="A+" @if (old('blood') == 'A+') selected @endif>A+
                                            </option>
                                            <option value="A-" @if (old('blood') == 'A-') selected @endif>A-
                                            </option>
                                            <option value="B+" @if (old('blood') == 'B+') selected @endif>B+
                                            </option>
                                            <option value="B-" @if (old('blood') == 'B-') selected @endif>B-
                                            </option>
                                            <option value="AB+" @if (old('blood') == 'AB+') selected @endif>AB+
                                            </option>
                                            <option value="AB-" @if (old('blood') == 'AB-') selected @endif>AB-
                                            </option>
                                            <option value="O+" @if (old('blood') == 'O+') selected @endif>O+
                                            </option>
                                            <option value="O-" @if (old('blood') == 'O-') selected @endif>O-
                                            </option>
                                        </select>
                                        @error('blood')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div> <br>

                                    <button type="submit" class="btn btn-primary d-block w-100 mb-3">Singup</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <hr>
@endsection
