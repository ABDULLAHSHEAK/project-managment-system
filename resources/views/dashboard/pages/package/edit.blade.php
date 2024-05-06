@extends('dashboard.layouts.master')
@section('title')
    Edit Package
@endsection
@section('content')
    <!---- page header -- -- -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class=" px-3 py-3">
                    <div class="row justify-content-between ">
                        <div class="align-items-center col">
                            <h4>Edit New Package</h4>
                        </div>
                        <div class="align-items-center col">
                            <div class="float-end m-0">
                                <span><a href="{{ route('home') }}" style="color: #007bff">Home</a> /
                                    <span>Edit Package</span></span>
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
            <a href="{{ url('dashboard/package') }}" class="btn btn-success float-end">Back</a>
            <div class="mainForm">
                <div class="row">
                    <div class="col-12 col-md-8 p-1">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ url('dashboard/package',$package->id) }}">
                                    @csrf
                                    @method('PUT')

                                    {{-- Package Name  --}}
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Package Name *</label>
                                        <input type="text" id="name" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Enter Trainer Name" value="{{ old('name', $package->name) }}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6 col-12">

                                            {{-- Package Price  --}}
                                            <div class="mb-3">
                                                <label for="price" class="form-label">Package Price *</label>
                                                <input type="text" id="price" name="price"
                                                    class="form-control @error('price') is-invalid @enderror"
                                                    placeholder="Enter Trainer Name"
                                                    value="{{ old('price', $package->price) }}">
                                                @error('price')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">

                                            {{-- Durations  --}}
                                            <div class="mb-3">
                                                <label for="duration" class="form-label">Duration (month) *</label>
                                                <input type="number" id="duration" name="duration"
                                                    class="form-control @error('duration') is-invalid @enderror"
                                                    placeholder="Enter Your phone"
                                                    value="{{ old('duration', $package->duration) }}">
                                                @error('duration')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Description Field -->
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror"
                                            placeholder="Enter the description">{{ old('description', $package->description) }}</textarea>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Services Included Field -->
                                    <div class="mb-3">
                                        <label for="services_include" class="form-label">Services Included</label>
                                        <textarea id="services_include" name="services_include"
                                            class="form-control @error('services_include') is-invalid @enderror" placeholder="Enter services included">{{ old('services_include', $package->services_include) }}</textarea>
                                        @error('services_include')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- Edititional Benefits Field -->
                                    <div class="mb-3">
                                        <label for="benefit" class="form-label">Additional Benefits</label>
                                        <textarea id="benefit" name="benefit" class="form-control @error('benefit') is-invalid @enderror"
                                            placeholder="Enter additional benefits">{{ old('benefit', $package->benefit) }}</textarea>
                                        @error('benefit')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="mb-3">
                                                <label for="status" class="form-label">Package Status *</label>
                                                <select id="status" name="status"
                                                    class="form-select @error('status') is-invalid @enderror">
                                                    <option value="">Select Status</option>
                                                    <option value="Running"
                                                        @if (old('status', $package->status) == 'Running') selected @endif>Running
                                                    </option>
                                                    <option value="Off"
                                                        @if (old('status', $package->status) == 'Off') selected @endif>
                                                        Off
                                                    </option>
                                                </select>
                                                @error('status')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="mb-3">
                                                <label for="trainer_id" class="form-label">Trainer *</label>
                                                <select id="trainer_id" name="trainer_id"
                                                    class="form-select @error('trainer_id') is-invalid @enderror">
                                                    <option value="">Select Trainer</option>
                                                    @foreach ($data as $trainer)
                                                        <option value="{{ $trainer->id }}"
                                                            @if (old('trainer_id', $package->trainer_id) == $trainer->id) selected @endif>
                                                            {{ $trainer->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('trainer_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
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
    </div>
    <hr>
@endsection
