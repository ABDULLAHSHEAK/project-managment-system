@extends('dashboard.layouts.master')
@section('title')
    Health Status Page
@endsection
@section('content')
    <!---- page header -- -- -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class=" px-3 py-3">
                    <div class="row justify-content-between ">
                        <div class="align-items-center col">
                            <h4>Health Status Page</h4>
                        </div>
                        <div class="align-items-center col">
                            <div class="float-end m-0">
                                <span><a href="index.html" style="color: #007bff">Home</a> /
                                    <span>Health Status</span></span>
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
            <div class="card">
                <div class="card-body">
                <div class="container-fluid">
                      <div class="row mx-auto">
                    <div class="col-md-10 col-12">
                       <h4> Member Info</h4>
                       <li style="list-style: none">Name :{{ $members->name}}</li>
                       <li style="list-style: none">Email : {{ $members->email}}</li>
                       <li style="list-style: none">Phone : {{ $members->phone}}</li>
                       <li style="list-style: none">Join Date :  {{ $members->join_date}}</li>
                       <li style="list-style: none">Package : {{ $members->package->name}}</li>
                    </div>
                    <div class="col-md-2 col-12 float-end">
                        <img src="{{asset('image/member')}}/{{ $members->img}}" alt="" width="100" height="100" class="rounded mb-2">
                        <li style="list-style: none">Age : {{ $members->age}}</li>
                    </div>
                    <hr class="m-2">
                    <div class="health-status mb-3">
                        <h4 class="text-center">Member Health Status</h4>
                        <div class="table-responsive">
                            <table class="table text-center">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>BP</th>
                                        <th>Diabetes</th>
                                        <th>Weight</th>
                                        <th>Height</th>
                                        <th>Blood Group</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($healths as $health)
                                    <tr>
                                        <td>{{$health->date}}</td>
                                        <td>{{$health->bp}}</td>
                                        <td>{{$health->diabetes}}</td>
                                        <td>{{$health->weight}} <span>(kg)</span></td>
                                        <td>{{$health->height}} <span>(inche)</span></td>
                                        <td>{{$health->blood}}</td>
                                        <td>
                                            <a href="{{route('health.delete',$health->id)}}" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                            data-bs-target="#HealthDelete{{ $health->id }}">Delete</a>
                                        </td>
                                    </tr>
                                    @include('dashboard.modal.health-delete')
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <a href="{{url('dashboard/health-status')}}" class="btn btn-success">Back</a>
                    <a href="{{route('health.print',$members->id)}}" class="btn btn-primary">Print</a>
                  </div>
                </div>
                </div>
            </div>


        </div>
    </div>
    <hr>
@endsection
