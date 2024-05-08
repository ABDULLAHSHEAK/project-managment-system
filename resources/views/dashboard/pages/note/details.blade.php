@extends('dashboard.layouts.master')
@section('title')
   Note Details
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
                                    <span>Note Details</span></span>
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
                    <a href="{{ url('dashboard/note') }}" class="btn btn-success float-end">Back</a>
                    <div class="col-12 col-md-8 p-1">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 col-12">
                                        <div class="img text-center mb-2">
                                            <img class="rounded mb-3" src="{{asset('image/file')}}/{{$data->file}}" alt="Employer Image" width="100">
                                            <br>
                                            <span class="p-3">{{$data->file}}</span>
                                            <a href="{{asset('image/file')}}/{{$data->file}}" class="btn btn-primary btn-sm mt-3">Download</a>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-12">
                                        <ul style="font-size: 20px;font-weight:200">
                                            <li style="list-style: none">Project Name : {{$data->project->name}}</li>
                                            <li style="list-style: none"> Date : {{$data->created_at->diffForHumans()}}</li>
                                            <li style="list-style: none">Note : <p>{{$data->note}}</p></li>

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
