@extends('dashboard.layouts.master')
@section('title')
   Client Profile
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
                                    <span>Client Profile</span></span>
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
                    <a href="{{ url('dashboard/client') }}" class="btn btn-success float-end">Back</a>
                    <div class="col-12 col-md-8 p-1">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2 col-12">
                                        <div class="img text-center mb-2">
                                            <img class="rounded" src="{{asset('image/client')}}/{{$data->img}}" alt="Client Image" width="100">
                                        </div>
                                    </div>
                                    <div class="col-md-10 col-12">
                                        <ul style="font-size: 20px;font-weight:200">
                                            <li style="list-style: none"><b>Name :</b> {{$data->name}}</li>
                                            <li style="list-style: none"><b>Email :</b> {{$data->email}}</li>
                                            <li style="list-style: none"><b>Phone :</b> {{$data->phone}}</li>
                                            <li style="list-style: none"><b>Address :</b> {{$data->address}}</li>
                                            <li style="list-style: none"><b>Gender :</b> {{$data->gender}}</li>
                                            <li style="list-style: none"><b>Note :</b> {{$data->note}}</li>
                                        </ul>
                                    </div>
                                </div>
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
