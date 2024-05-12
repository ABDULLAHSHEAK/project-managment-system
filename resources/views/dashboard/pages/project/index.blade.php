@extends('dashboard.layouts.master')
@section('title')
    All Project
@endsection
@section('content')
    <!---- page header -- -- -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class=" px-3 py-3">
                    <div class="row justify-content-between ">
                        <div class="align-items-center col">
                            <h4>Project Page</h4>
                        </div>
                        <div class="align-items-center col">
                            <div class="float-end m-0">
                                <span><a href="index.html" style="color: #007bff">Home</a> /
                                    <span>Project</span></span>
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
            <a href="{{ url('dashboard/project/create') }}" class="btn btn-success float-end">Add Project</a>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tableData" class="table">
                            <thead class="bg-gradient-light">
                                <tr>
                                    <th>NO:</th>
                                    <th>Project Name</th>
                                    <th>Start Date</th>
                                    <th>Deadline</th>
                                    <th>Client</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $project)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $project->name }}</td>
                                        <td>{{ $project->start_date }}</td>
                                        <td>{{ $project->deadline }}</td>
                                        <td>{{ $project->client->name }}</td>
                                        <td>{{ $project->category->category_name }}</td>
                                        <td>
                                            {{ $project->status }}
                                            <div class="progress" style="height: 10px;">
                                                            <div class="progress-bar"
                                                                style="width:{{ $project->completion_status }}%;height:12px">
                                                                {{ $project->completion_status }} %</div>
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
                                                            href="{{ url('/dashboard/project/' . $project->id . '/details') }}">View
                                                            Details</a></li>
                                                    <li><a class="dropdown-item"
                                                            href="{{ url('dashboard/project/' . $project->id . '/edit') }}">Edit</a>
                                                    </li>
                                                    <li><a class="dropdown-item"
                                                            href="{{ url('dashboard/note-add/' . $project->id) }}">Add Note</a>
                                                    </li>
                                                    <li><a class="dropdown-item"
                                                            href="{{ url('dashboard/task-add/' . $project->id) }}">Add Task</a>
                                                    </li>
                                                    <li><a class="dropdown-item"
                                                            href="{{ url('dashboard/collection-add/' . $project->id) }}">Add Collection</a>
                                                    </li>
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                            data-bs-target="#projectDelete{{ $project->id }}">Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @include('dashboard.modal.project-delete')
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
