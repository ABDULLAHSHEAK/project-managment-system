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
                            <h4>Add New Collection</h4>
                        </div>
                        <div class="align-items-center col">
                            <div class="float-end m-0">
                                <span><a href="{{ route('home') }}" style="color: #007bff">Home</a> /
                                    <span>Add Collection</span></span>
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
                                <form method="POST" action="{{ url('dashboard/collection') }}" enctype="multipart/form-data">
                                    @csrf
                                         {{-- amount --}}
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Project Amount *</label> <br>
                                        <input class="form-control" disabled value="{{$project->amount}}">
                                    </div>
                                    {{-- project name  --}}
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Project Name *</label> <br>
                                        <input class="form-control" disabled value="{{$project->name}}">
                                        <input class="form-control" type="hidden" name="project_id" value="{{$project->id}}">

                                    {{-- collection  --}}
                                     <div class="mb-3">
                                        <label for="collect" class="form-label">Project Collection*</label>
                                        <input type="number" id="collect" name="collect"
                                            class="form-control @error('collect') is-invalid @enderror"
                                            placeholder="Enter Collection Amount" value="{{ old('collect') }}">
                                        @error('collect')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    {{-- Project date  --}}
                                    {{-- date  --}}
                                     <div class="mb-3">
                                                <label for="date" class="form-label">Date *</label>
                                                <input type="date" id="date" name="date"
                                                    class="form-control @error('date') is-invalid @enderror"
                                                    placeholder="Enter Task Start Date" value="{{ old('date') }}">
                                                @error('date')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                 <br>

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
