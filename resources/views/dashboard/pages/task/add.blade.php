@extends('dashboard.layouts.master')
@section('title')
    Add Task
@endsection
@section('content')
    <!---- page header -- -- -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class=" px-3 py-3">
                    <div class="row justify-content-between ">
                        <div class="align-items-center col">
                            <h4>Add New Task</h4>
                        </div>
                        <div class="align-items-center col">
                            <div class="float-end m-0">
                                <span><a href="{{ route('home') }}" style="color: #007bff">Home</a> /
                                    <span>Add Task</span></span>
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
            <a href="{{ url('dashboard/project') }}" class="btn btn-success float-end">Back</a>
            <div class="mainForm">
                <div class="row">
                    <div class="col-12 col-md-8 p-1">
                        <div class="card">
                            <div class="card-body">
                                {{-- @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif --}}
                                <form method="POST" action="{{ url('dashboard/task') }}" enctype="multipart/form-data">
                                    @csrf
                                    {{-- name --}}
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Task Name *</label>
                                        <input type="text" id="name" name="name"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Enter Task Name" value="{{ old('name') }}">
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            {{-- start_date  --}}
                                            <div class="mb-3">
                                                <label for="start_date" class="form-label">Start Date *</label>
                                                <input type="date" id="start_date" name="start_date"
                                                    class="form-control @error('start_date') is-invalid @enderror"
                                                    placeholder="Enter Task Start Date" value="{{ old('start_date') }}">
                                                @error('start_date')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            {{-- deadline number  --}}
                                            <div class="mb-3">
                                                <label for="deadline" class="form-label">Deadline *</label>
                                                <input type="date" id="deadline" name="deadline"
                                                    class="form-control @error('deadline') is-invalid @enderror"
                                                    placeholder="Enter Task deadline" value="{{ old('deadline') }}">
                                                @error('deadline')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                    {{-- summary  --}}
                                    <div class="mb-3">
                                        <label for="summary" class="form-label">Task Details *</label>
                                        <textarea id="summary" name="summary" class="form-control @error('summary') is-invalid @enderror"
                                            placeholder="Enter your summary">{{ old('summary') }}</textarea>
                                        @error('summary')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    {{-- --------  --}}
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            {{-- Status  --}}
                                            {{-- ----- status --  --}}
                                            <div class="mb-3">
                                                <label for="status" class="form-label">Status *</label>
                                                <select id="status" name="status"
                                                    class="form-select @error('status') is-invalid @enderror">
                                                    <option value="">Select Status</option>
                                                    <option value="not_started"
                                                        @if (old('status') == 'not_started') selected @endif>
                                                        Not Started
                                                    </option>
                                                    <option value="running"
                                                        @if (old('status') == 'running') selected @endif>
                                                        Running
                                                    </option>
                                                    <option value="canceled"
                                                        @if (old('status') == 'canceled') selected @endif>
                                                        Canceled
                                                    </option>
                                                    <option value="completed"
                                                        @if (old('status') == 'completed') selected @endif>
                                                        Completed
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
                                            {{-- Status2  --}}
                                            <div class="mb-3">
                                                <label for="completion_status" class="form-label">Completion Status
                                                    *</label>

                                                <div class="container">
                                                    <input
                                                        class="form-control-range @error('completion_status') is-invalid @enderror"
                                                        name="completion_status" type="range" id="rangeInput"
                                                        min="0" max="100" value="1"
                                                        oninput="updateOutput(this.value)">
                                                    <output id="output">1</output>
                                                </div>

                                                @error('completion_status')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    {{-- ------- Employer_id & Project ---------  --}}
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            {{-- Team Employer_ids --}}
                                            <div class="mb-3">
                                                <label for="employer_id" class="form-label">Member *</label>
                                                <select id="employer_id" name="employer_id"
                                                    class="form-select @error('employer_id') is-invalid @enderror">
                                                    <option value="">Select Member</option>
                                                    @foreach ($employers as $employer)
                                                        <option value="{{ $employer->id }}"
                                                            {{ old('employer') == $employer->id ? 'selected' : '' }}>
                                                            {{ $employer->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('employer_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            {{-- Project --}}
                                            <div class="mb-3">
                                                <label for="project_id" class="form-label">Project *</label>
                                                <select id="project_id" name="project_id"
                                                    class="form-select @error('project_id') is-invalid @enderror">
                                                    <option value="">Select Category</option>
                                                    @foreach ($projects as $project)
                                                        <option value="{{ $project->id }}"
                                                            {{ old('project_id',$data) == $project->id ? 'selected' : '' }}>
                                                            {{ $project->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('project_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                       {{-- file --}}
                                    <div class="mb-3">
                                        <label for="file" class="form-label">Project File</label>
                                        <input type="file" id="file" name="file"
                                            class="form-control @error('file') is-invalid @enderror">
                                        @error('file')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div> <br>

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
    <script>
        function updateOutput(val) {
            document.getElementById('output').textContent = val;
        }
    </script>
@endsection
