@extends('dashboard.layouts.master')
@section('title')
    All Task
@endsection
@section('content')
    <!---- page header -- -- -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class=" px-3 py-3">
                    <div class="row justify-content-between ">
                        <div class="align-items-center col">
                            <h4>Task Page</h4>
                        </div>
                        <div class="align-items-center col">
                            <div class="float-end m-0">
                                <span><a href="index.html" style="color: #007bff">Home</a> /
                                    <span>Task</span></span>
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
            <a href="{{ url('dashboard/task/create') }}" class="btn btn-success float-end">Add Task</a>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tableData" class="table">
                            <thead class="bg-gradient-light">
                                <tr>
                                    <th>NO:</th>
                                    <th>Task Name</th>
                                    <th>Members</th>
                                    <th>Start Date</th>
                                    <th>Deadline</th>
                                    <th>Project Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $task)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $task->name }}</td>
                                        <td>{{ $task->employer->name }}</td>
                                        <td>{{ $task->start_date }}</td>
                                        <td>{{ $task->deadline }}</td>
                                        <td>{{ $task->project->name }}</td>
                                        <td>
                                            {{ $task->status }}
                                            <div class="progress" style="height: 10px;">
                                                            <div class="progress-bar"
                                                                style="width:{{ $task->completion_status }}%;height:12px">
                                                                {{ $task->completion_status }} %</div>
                                                        </div>
                                        </td>
                                        <td>
                                            <!-- Example single danger button -->
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-danger dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    Options
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item"
                                                            href="{{ url('/dashboard/task/' . $task->id . '/details') }}">View
                                                            Details</a></li>
                                                    <li><a class="dropdown-item"
                                                            href="{{ url('dashboard/task/' . $task->id . '/edit') }}">Edit</a>
                                                    </li>
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                            data-bs-target="#taskDelete{{ $task->id }}">Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @include('dashboard.modal.task-delete')
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
