@extends('dashboard.layouts.master')
@section('title')
    Old Member
@endsection
@section('content')
    <!---- page header -- -- -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class=" px-3 py-3">
                    <div class="row justify-content-between ">
                        <div class="align-items-center col">
                            <h4>Old Member Page</h4>
                        </div>
                        <div class="align-items-center col">
                            <div class="float-end m-0">
                                <span><a href="index.html" style="color: #007bff">Home</a> /
                                    <span>Old Member</span></span>
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
            <a href="{{ url('dashboard/member') }}" class="btn btn-success float-end">Running Member</a>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tableData" class="table">
                            <thead class="bg-gradient-light">
                                <tr>
                                    <th>SL/NO</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Shift</th>
                                    <th>Package</th>
                                    <th>Price</th>
                                    <th>Due</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $member)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img src="{{ asset('image/member') }}/{{ $member->img }}" alt="member Image"
                                                width="40"></td>
                                        <td>{{ $member->name }}</td>
                                        <td>{{ $member->phone }}</td>
                                        <td>{{ $member->shift->name }}</td>
                                        <td>{{ $member->package->name }}</td>
                                        <td>{{ $member->package->price }}</td>
                                        <td>1500</td>
                                        <td>{{$member->status}}</td>
                                        <td>
                                            <!-- Example single danger button -->
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-danger dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    Options
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="#">View Details</a></li>
                                                    <li><a class="dropdown-item"
                                                            href="{{ url('dashboard/member/' . $member->id . '/edit') }}">Edit</a>
                                                    </li>

                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                            data-bs-target="#memberDelete{{ $member->id }}">Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @include('dashboard.modal.member-delete')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <hr>
@endsection
