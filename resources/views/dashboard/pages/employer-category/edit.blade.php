@extends('dashboard.layouts.master')
@section('title')
    Add Employer Category
@endsection
@section('content')
    <!---- page header -- -- -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class=" px-3 py-3">
                    <div class="row justify-content-between ">
                        <div class="align-items-center col">
                            <h4>Add New Employer Category</h4>
                        </div>
                        <div class="align-items-center col">
                            <div class="float-end m-0">
                                <span><a href="{{ route('home') }}" style="color: #007bff">Home</a> /
                                    <span>Add Employer Category</span></span>
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
            <a href="{{ url('dashboard/employer-category') }}" class="btn btn-success float-end">Employer Category</a>
            <div class="mainForm">
                <div class="row">
                    <div class="col-12 col-md-8 p-1">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ url('dashboard/employer-category',$category->id) }}" >
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="employer_category_name" class="form-label">Employer Category name *</label>
                                        <input type="text" id="employer_category_name" name="employer_category_name"
                                            class="form-control @error('employer_category_name') is-invalid @enderror"
                                            placeholder="Enter employer Category Name" value="{{ old('employer_category_name',$category->category_name) }}">
                                        @error('employer_category_name')
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
@endsection
