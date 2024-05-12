@extends('dashboard.layouts.master')
@section('title')
    Add Collection
@endsection
@section('content')
    <!---- page header -- -- -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class=" px-3 py-3">
                    <div class="row justify-content-between ">
                        <div class="align-items-center col">
                            <h4>Edit New Collection</h4>
                        </div>
                        <div class="align-items-center col">
                            <div class="float-end m-0">
                                <span><a href="{{ route('home') }}" style="color: #007bff">Home</a> /
                                    <span>Edit Collection</span></span>
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
            <a href="{{ url('dashboard/collection') }}" class="btn btn-success float-end">Back</a>
            <div class="mainForm">
                <div class="row">
                    <div class="col-12 col-md-8 p-1">
                        <div class="card">
                             @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            <div class="card-body">
                                <form method="POST" action="{{ url('dashboard/collection', $collection->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    {{-- name --}}
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Project Amount *</label> <br>
                                        <input class="form-control" disabled value="{{$collection->project->amount}}"></input>
                                    </div>

                                    {{-- collection  --}}
                                     <div class="mb-3">
                                        <label for="collect" class="form-label">Project Collection*</label>
                                        <input type="number" id="collect" name="collect"
                                            class="form-control @error('collect') is-invalid @enderror"
                                            placeholder="Enter Collection Amount" value="{{ old('collect',$collection->collect) }}">
                                        @error('collect')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    {{-- Project name  --}}
                                     <div class="mb-3">
                                                <label for="project_id" class="form-label">Project Name *</label>
                                                <select disabled id="project_id" name="project_id"
                                                    class="form-select @error('project_id') is-invalid @enderror">
                                                    <option value="">Select Category</option>
                                                    @foreach ($projects as $project)
                                                        <option value="{{ $project->id }}"
                                                            {{ old('project_id', $project->id) == $project->id ? 'selected' : '' }}>
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

                                    <button type="submit" class="btn btn-primary d-block w-100 mb-3">Update</button>
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
