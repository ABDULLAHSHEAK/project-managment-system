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
                    <a href="{{ url('dashboard/project') }}" class="btn btn-success float-end">Back</a>
                    <div class="col-12 col-md-12 p-1">
                        <div class="card">
                            @if (auth()->user()->user_type === 'admin')
                                <div class="card-body">
                                    {{-- ----- status -----  --}}
                                    <div class="row mx-auto my-3">
                                        <div class="bg-light p-3 text-center">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <span style="font-size: 15px"><b>Project Status</b></sp>
                                                        <span class="badge bg-primary">Running</span>
                                                </div>
                                                <div class="col-md-6"> <a
                                                        href="{{ url('dashboard/project/' . $project->id . '/edit') }}"
                                                        class="badge bg-primary" style="font-size: 15px">Edit</a></div>
                                            </div>


                                        </div>
                                    </div>
                                    {{-- ----- status end -----  --}}
                                    <!-- Tabs Begin -->
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                                data-bs-target="#nav-home" type="button" role="tab"
                                                aria-controls="nav-home" aria-selected="true">Overview</button>
                                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                                                data-bs-target="#nav-profile" type="button" role="tab"
                                                aria-controls="nav-profile" aria-selected="false">Members</button>
                                            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                                data-bs-target="#nav-contact" type="button" role="tab"
                                                aria-controls="nav-contact" aria-selected="false">File</button>

                                            <button class="nav-link" id="nav-task-tab" data-bs-toggle="tab"
                                                data-bs-target="#nav-task" type="button" role="tab"
                                                aria-controls="nav-task" aria-selected="false">Task</button>
                                        </div>
                                    </nav>
                                    <div class="tab-content py-3" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                            aria-labelledby="nav-home-tab">
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="basic bg-light p-3">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <h5>Project Progress</h5>
                                                                <div class="progress" style="height: 10px;">
                                                                    <div class="progress-bar"
                                                                        style="width:{{ $project->completion_status }}%;height:12px">
                                                                        {{ $project->completion_status }} %</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <p>Start Date</p>
                                                                <span>{{ $project->start_date }}</span>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <p>Deadline</p>
                                                                <p>{{ $project->deadline }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- <div class="col-md-2"></div> --}}
                                                <div class="col-md-6 col-12">
                                                    <div class="bg-light p-3">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <h5>Client</h5>
                                                                <img width="50" class="rounded"
                                                                    src="{{ asset('image/client') }}/{{ $project->client->img }}"
                                                                    alt="Client Image">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <h5>{{ $project->client->name }}</h5>
                                                                <span>{{ $project->client->email }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- --- project collection ----  --}}
                                            <div class="row mt-3">
                                                <div class="col-md-12">
                                                    <div class="bg-light p-3">
                                                        <div class="row">
                                                            <div class="col-md-6 col-12">
                                                                <div class="row">
                                                                    <div class="col-md-4 col-12">
                                                                        <p>Project Amount</p>
                                                                        {{ $project->amount }} - bdt
                                                                    </div>
                                                                    <div class="col-md-4 col-12">
                                                                        <p>Total Collection</p>
                                                                        {{ $collection }}
                                                                    </div>
                                                                    <div class="col-md-4 col-12">
                                                                        <p>Due Payment</p>
                                                                        {{ number_format((float) $project->amount - (float) $collection, 2, '.', '') }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-12"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- --- project details----  --}}
                                            <div class="row mt-3">
                                                <div class="col-md-12">
                                                    <div class="bg-light p-3">
                                                        <h5>Project Summary</h5>
                                                        <p>{{ $project->summary }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- -------- members --------  --}}
                                        <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                            aria-labelledby="nav-profile-tab">
                                            <div class="table-responsive">
                                                <table id="tableData" class="table">
                                                    <thead class="bg-gradient-light">
                                                        <tr>
                                                            <th>NO:</th>
                                                            <th>Image</th>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Phone</th>
                                                            <th>Category</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($memberData as $employer)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td><img src="{{ asset('image/employer') }}/{{ $employer->img }}"
                                                                        alt="employer Image" width="40"></td>
                                                                <td><a
                                                                        href="{{ url('/dashboard/employer/' . $employer->id . '/details') }}">{{ $employer->name }}</a>
                                                                </td>
                                                                <td>{{ $employer->email }}</td>
                                                                <td>{{ $employer->phone }}</td>
                                                                <td>{{ $employer->employerCategory->category_name }}</td>
                                                                <td>
                                                                    <a class="btn btn-success btn-sm"
                                                                        href="{{ url('/dashboard/employer/' . $employer->id . '/details') }}">View</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        {{-- ------ file ---  --}}
                                        <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                            aria-labelledby="nav-contact-tab">
                                            <div class="row">
                                                <div class="file bg-light p-3">
                                                    <div class="table-responsive">
                                                        <table id="tableData" class="table">
                                                            <thead class="bg-gradient-light">
                                                                <tr>
                                                                    <th>NO:</th>
                                                                    <th>File</th>
                                                                    <th>Note</th>
                                                                    <th>Created at</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($notes as $note)
                                                                    <tr>
                                                                        <td>{{ $loop->iteration }}</td>
                                                                        <td><img src="{{ asset('image/file') }}/{{ $note->file }}"
                                                                                alt="note file" width="40"> <br>
                                                                            <span>{{ $note->file }}</span>
                                                                        </td>
                                                                        <td>{{ $note->note }}</td>
                                                                        <td>{{ $note->created_at }}</td>
                                                                        <td>
                                                                            <!-- Example single danger button -->
                                                                            <div class="btn-group">
                                                                                <button type="button"
                                                                                    class="btn btn-danger dropdown-toggle"
                                                                                    data-bs-toggle="dropdown"
                                                                                    aria-expanded="false">
                                                                                    Options
                                                                                </button>
                                                                                <ul class="dropdown-menu">
                                                                                    <li><a class="dropdown-item"
                                                                                            href="{{ url('/dashboard/note/' . $note->id . '/details') }}">View
                                                                                            Details</a></li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="{{ url('dashboard/note/' . $note->id . '/edit') }}">Edit</a>
                                                                                    </li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="{{ asset('image/file') }}/{{ $note->file }}">Download
                                                                                            File</a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <hr class="dropdown-divider">
                                                                                    </li>
                                                                                    <li><a class="dropdown-item"
                                                                                            href="#"
                                                                                            data-bs-toggle="modal"
                                                                                            data-bs-target="#NoteDelete{{ $note->id }}">Delete</a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    @include('dashboard.modal.note-delete')
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- form --}}
                                            <div class="row mt-3">
                                                <div class="bg-light p-3">
                                                    <form
                                                        action="{{ url('/dashboard/project/' . $project->id . '/details') }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
                                                            <h5>Add New Note Or File</h5>
                                                            <div class="col-md-5 col-12">
                                                                <div class="mb-3">
                                                                    <label for="note" class="form-label">Note</label>
                                                                    <textarea id="note" name="note" class="form-control @error('note') is-invalid @enderror"
                                                                        placeholder="Enter your note">{{ old('note') }}</textarea>
                                                                    @error('note')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5 col-12">
                                                                <div class="mb-3">
                                                                    <label for="file" class="form-label">file</label>
                                                                    <input type="file" id="file" name="file"
                                                                        class="form-control @error('file') is-invalid @enderror">
                                                                    @error('file')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 col-12 mx-auto text-center mt-4">
                                                                <button type="submit"
                                                                    class="btn btn-primary d-block w-100 mb-3">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- ------ task ---  --}}
                                        <div class="tab-pane fade" id="nav-task" role="tabpanel"
                                            aria-labelledby="nav-task-tab">
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
                                                        @foreach ($tasks as $task)
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
                                                                        <button type="button"
                                                                            class="btn btn-danger dropdown-toggle"
                                                                            data-bs-toggle="dropdown"
                                                                            aria-expanded="false">
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
                                                                            <li><a class="dropdown-item" href="#"
                                                                                    data-bs-toggle="modal"
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
                                    <!-- Tabs End -->
                                </div>
                            @else
                                <div class="card-body">
                                    {{-- ----- status end -----  --}}
                                    <!-- Tabs Begin -->
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                                data-bs-target="#nav-home" type="button" role="tab"
                                                aria-controls="nav-home" aria-selected="true">Overview</button>
                                            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                                data-bs-target="#nav-contact" type="button" role="tab"
                                                aria-controls="nav-contact" aria-selected="false">File</button>

                                            <button class="nav-link" id="nav-task-tab" data-bs-toggle="tab"
                                                data-bs-target="#nav-task" type="button" role="tab"
                                                aria-controls="nav-task" aria-selected="false">Task</button>
                                        </div>
                                    </nav>
                                    <div class="tab-content py-3" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                            aria-labelledby="nav-home-tab">
                                            <div class="row">
                                                <div class="col-md-6 col-12">
                                                    <div class="basic bg-light p-3">
                                                        <div class="row">
                                                            <div class="">
                                                                <p>Project Deadline</p>
                                                                <p>{{ $project->deadline }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- ------ file ---  --}}
                                        <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                            aria-labelledby="nav-contact-tab">
                                            <div class="row">
                                            </div>
                                            {{-- form --}}
                                            <div class="row mt-3">
                                                <div class="bg-light p-3">
                                                    <form
                                                        action="{{ url('/employer-dashboard/project/' . $project->id . '/details') }}"
                                                        method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
                                                            <h5>Add New Note Or File</h5>
                                                            <div class="col-md-5 col-12">
                                                                <div class="mb-3">
                                                                    <label for="note" class="form-label">Note</label>
                                                                    <textarea id="note" name="note" class="form-control @error('note') is-invalid @enderror"
                                                                        placeholder="Enter your note">{{ old('note') }}</textarea>
                                                                    @error('note')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-5 col-12">
                                                                <div class="mb-3">
                                                                    <label for="file" class="form-label">file</label>
                                                                    <input type="file" id="file" name="file"
                                                                        class="form-control @error('file') is-invalid @enderror">
                                                                    @error('file')
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-2 col-12 mx-auto text-center mt-4">
                                                                <button type="submit"
                                                                    class="btn btn-primary d-block w-100 mb-3">Submit</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- ------ task ---  --}}
                                        <div class="tab-pane fade" id="nav-task" role="tabpanel"
                                            aria-labelledby="nav-task-tab">
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
                                                        @foreach ($tasks as $task)
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
                                                                        <button type="button"
                                                                            class="btn btn-danger dropdown-toggle"
                                                                            data-bs-toggle="dropdown"
                                                                            aria-expanded="false">
                                                                            Options
                                                                        </button>
                                                                        <ul class="dropdown-menu">
                                                                            <li><a class="dropdown-item"
                                                                                    href="{{ url('/employer-dashboard/task/' . $task->id . '/details') }}">View
                                                                                    Details</a></li>
                                                                            <li><a class="dropdown-item"
                                                                                    href="{{ url('employer-dashboard/task', $task->id ) }}">Edit</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Tabs End -->
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </div>
    <hr>
@endsection
