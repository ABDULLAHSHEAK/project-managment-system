@extends('dashboard.layouts.master')
@section('title')
    Add Health Report
@endsection
@section('content')
    <!---- page header -- -- -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class=" px-3 py-3">
                    <div class="row justify-content-between ">
                        <div class="align-items-center col">
                            <h4>Add New Health Report</h4>
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                        </div>
                        <div class="align-items-center col">
                            <div class="float-end m-0">
                                <span><a href="{{ route('home') }}" style="color: #007bff">Home</a> /
                                    <span>Add Health Report</span></span>
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
            <a href="{{ url('dashboard/health-status') }}" class="btn btn-success float-end">All Health Report</a>
            <div class="container">
                <ul>
                    <li style="list-style: none"><b>Member ID : </b> {{ $members->id }}</li>
                    <li style="list-style: none"><b>Member Name : </b> {{ $members->name }}</li>
                    <li style="list-style: none"><b>Member Email : </b> {{ $members->email }}</li>
                </ul>
            </div>
            <div class="mainForm">
                <div class="row">
                    <div class="col-12 col-md-8 p-1">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ route('health.store') }}">
                                    @csrf
                                    {{-- Blood Pressure (BP) *  --}}
                                    <div class="mb-3">
                                        <label for="bp" class="form-label">Blood Pressure (BP) *</label>
                                        <input type="text" id="bp" name="bp"
                                            class="form-control @error('bp') is-invalid @enderror"
                                            placeholder="Enter Member Current BP" value="{{ old('bp') }}">
                                        @error('bp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6 col-12">

                                            {{-- Diabetes (Blood Sugar Levels)   --}}
                                            <div class="mb-3">
                                                <label for="diabetes" class="form-label">Diabetes (Blood Sugar Levels)
                                                    *</label>
                                                <input type="text" id="diabetes" name="diabetes"
                                                    class="form-control @error('diabetes') is-invalid @enderror"
                                                    placeholder="Enter Member Current Diabetes Level" value="{{ old('diabetes') }}">
                                                @error('diabetes')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">

                                            {{-- Weight --}}
                                            <div class="mb-3">
                                                <label for="weight" class="form-label">Weight (kg) *</label>
                                                <input type="text" id="weight" name="weight"
                                                    class="form-control @error('weight') is-invalid @enderror"
                                                    placeholder="Enter Member Current Weight" value="{{ old('weight') }}">
                                                @error('weight')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>

                                    {{-- height    --}}
                                    <div class="mb-3">
                                        <label for="height" class="form-label">Height (inche) *</label>
                                        <input type="number" id="height" name="height"
                                            class="form-control @error('height') is-invalid @enderror"
                                            placeholder="Enter Member Current Height" value="{{ old('height',$members->health->height) }}">
                                        @error('height')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    {{-- join date   --}}
                                    <div class="mb-3">
                                        <label for="date" class="form-label">Date *</label>
                                        <input type="date" id="date" name="date"
                                            class="form-control @error('date') is-invalid @enderror"
                                            placeholder="Enter date" value="{{ old('date') }}">
                                        @error('date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    {{-- ------ Blood Group ----  --}}

                                    <div class="mb-3">
                                        {{-- <label for="blood" class="form-label">Blood Type *</label> --}}
                                        <input hidden type="text" value="{{ old('blood', $members->health->blood ?? '') }}"
                                            name="blood" class="form-control @error('blood') is-invalid @enderror">
                                        @error('blood')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    {{-- memeber id  --}}
                                    <div class="mb-3">
                                        {{-- <label for="member_id" class="form-label">Member ID *</label> --}}
                                        <input type="hidden" value="{{ $members->id }}" name="member_id"
                                            class="form-control">
                                        {{-- Display member_id value as hidden input for form submission --}}
                                        @error('member_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                            </div>
                        </div>
                    </div>
                    <br>

                    <button type="submit" class="btn btn-primary d-block w-100 mb-3">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4"></div>
    </div>
    </div>
    <hr>
@endsection
