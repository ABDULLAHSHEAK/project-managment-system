@extends('dashboard.layouts.master')
@section('title')
    Add Note
@endsection
@section('content')
    <!---- page header -- -- -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class=" px-3 py-3">
                    <div class="row justify-content-between ">
                        <div class="align-items-center col">
                            <h4>Add New Note</h4>
                        </div>
                        <div class="align-items-center col">
                            <div class="float-end m-0">
                                <span><a href="{{ route('home') }}" style="color: #007bff">Home</a> /
                                    <span>Add Note</span></span>
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
            <a href="{{ url('dashboard/note') }}" class="btn btn-success float-end">Back</a>
            <div class="mainForm">
                <div class="row">
                    <div class="col-12 col-md-8 p-1">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ url('dashboard/note') }}" enctype="multipart/form-data">
                                    @csrf
                                     {{-- note --}}
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

                                     {{-- Project --}}
                                            <div class="mb-3">
                                                <label for="project_id" class="form-label">Project *</label>
                                                <select id="project_id" name="project_id"
                                                    class="form-select @error('project_id') is-invalid @enderror">
                                                    <option value="">Select Project</option>
                                                    @foreach ($projects as $project)
                                                        <option value="{{ $project->id }}"
                                                            {{ old('project_id') == $project->id ? 'selected' : '' }}>
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
@endsection
