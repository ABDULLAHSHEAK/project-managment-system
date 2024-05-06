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
                            <h4>Edit Member</h4>
                        </div>
                        <div class="align-items-center col">
                            <div class="float-end m-0">
                                <span><a href="{{ route('home') }}" style="color: #007bff">Home</a> /
                                    <span>Edit Member</span></span>
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
            <a href="{{ url('dashboard/member') }}" class="btn btn-success float-end">Back</a>
            <div class="mainForm">
                <div class="row">
                    <div class="col-12 col-md-8 p-1">
                        <div class="card">
                          <div class="card-body">
                              <form method="POST" action="{{ url('dashboard/member',$member->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                {{-- name --}}
                                <div class="mb-3">
                                    <label for="name" class="form-label">Member Name *</label>
                                    <input type="text" id="name" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Enter Member Name" value="{{ old('name',$member->name) }}">
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
                                                placeholder="Enter Member Email" value="{{ old('email',$member->email) }}">
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
                                                placeholder="Enter Your phone" value="{{ old('phone',$member->phone) }}">
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
                                        placeholder="Enter Member address">{{ old('address',$member->address) }}</textarea>
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
                                                placeholder="Enter your join_date" value="{{ old('join_date',$member->join_date) }}">
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
                                                placeholder="Enter Member age" value="{{ old('age',$member->age) }}">
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
                                                        {{ old('package_id',$member->package_id) == $package->id ? 'selected' : '' }}>
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
                                                        {{ old('shift_id',$member->shift_id) == $shift->id ? 'selected' : '' }}>
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
                                        placeholder="Enter Note About Member ">{{ old('note',$member->note) }}</textarea>
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
                                        <option value="running" @if (old('status',$member->status) == 'running') selected @endif>running
                                        </option>
                                        <option value="complete" @if (old('status',$member->status) == 'complete') selected @endif>Complete
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
                                </div>
                                <br>
                                <img src="{{asset('image/member')}}/{{$member->img}}" class="rounded" alt="Member Image" width="80"> <br>
                                <br>

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
