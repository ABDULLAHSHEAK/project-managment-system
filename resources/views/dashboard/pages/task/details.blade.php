@extends('dashboard.layouts.master')
@section('title')
    Task Details
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
                                    <span>Task Details</span></span>
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
                    <a href="{{ url('dashboard/task') }}" class="btn btn-success float-end">Back</a>
                    <div class="col-12 col-md-8 p-1">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 col-12">
                                        <div class="img text-center mb-2">
                                            <img class="rounded mb-3" src="{{ asset('image/task') }}/{{ $task->file }}"
                                                alt="Employer Image" width="100">
                                            <br>
                                            <span class="p-3">{{ $task->file }}</span>
                                            <a href="{{ asset('image/task') }}/{{ $task->file }}"
                                                class="btn btn-primary btn-sm mt-3">Download</a>
                                        </div>
                                    </div>
                                    <div class="col-md-8 col-12">
                                        <ul style="font-size: 16px;font-weight:200">
                                            <li style="list-style: none">
                                                Task Name : {{ $task->name }}
                                            </li>
                                            <li style="list-style: none">
                                                Member Name : {{ $task->employer->name }}
                                            </li>
                                            <li style="list-style: none">
                                                Project Name : {{ $task->project->name }}
                                            </li>
                                            <li style="list-style: none">
                                                Start Date : {{ $task->start_date }}
                                            </li>
                                            <li style="list-style: none">
                                                Deadline : {{ $task->deadline }}
                                            </li>
                                            <li style="list-style: none">
                                                Status : {{ $task->status }}
                                            </li>
                                            <li style="list-style: none">
                                                <div class="row">
                                                    <div class="col-md-6 col-12"> Completion Status :</div>
                                                    <div class="col-md-6 col-12 mt-2">
                                                        <div class="progress" style="height: 10px;">
                                                            <div class="progress-bar"
                                                                style="width:{{ $task->completion_status }}%;height:12px">
                                                                {{ $task->completion_status }} %</div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </li>
                                            <li style="list-style: none">Task Details : <p>{{ $task->summary }}</p>
                                            </li>

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
