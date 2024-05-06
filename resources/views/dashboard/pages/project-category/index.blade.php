@extends('dashboard.layouts.master')
@section('title')
    Project Category
@endsection
@section('content')
    <!---- page header -- -- -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class=" px-3 py-3">
                    <div class="row justify-content-between ">
                        <div class="align-items-center col">
                            <h4>All Project Category</h4>
                        </div>
                        <div class="align-items-center col">
                            <div class="float-end m-0">
                                <span><a href="{{ route('home') }}" style="color: #007bff">Home</a> /
                                    <span>Project Category</span></span>
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
            <div class="card">
                <a href="{{url('dashboard/project-category/create')}}" class="btn btn-success">Add Project Category</a>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tableData" class="table">
                            <thead class="bg-gradient-light">
                                <tr>
                                    <th>NO:</th>
                                    <th>Category Name</th>
                                    <th>Created-at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $category->category_name }}</td>
                                        <td>{{$category->created_at}}</td>
                                        <td>
                                           <a href="{{url('dashboard/project-category/' . $category->id.'/edit')}}" class="btn btn-success btn-sm">Edit</a>
                                           <a href="javascript:void(0)" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                            data-bs-target="#DeleteProjectCategory{{ $category->id }}">Delete</a>
                                        </td>
                                    </tr>
                                   @include('dashboard.modal.project-category')
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
