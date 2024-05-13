@extends('dashboard.layouts.master')
@section('title')
    All Collection
@endsection
@section('content')
    <!---- page header -- -- -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class=" px-3 py-3">
                    <div class="row justify-content-between ">
                        <div class="align-items-center col">
                            <h4>Collection Page</h4>
                        </div>
                        <div class="align-items-center col">
                            <div class="float-end m-0">
                                <span><a href="index.html" style="color: #007bff">Home</a> /
                                    <span>Collection</span></span>
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
            <a href="{{ url('dashboard/collection/create') }}" class="btn btn-success float-end">Add Collection</a>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tableData" class="table">
                            <thead class="bg-gradient-light">
                                <tr>
                                    <th>NO:</th>
                                    <th>Project Amount</th>
                                    <th>Collection</th>
                                    <th>Date</th>
                                    <th>Project Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $collection)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $collection->project->amount }} - bdt</td>
                                        <td>{{ $collection->collect }} - bdt</td>
                                        <td>{{ $collection->date }}</td>
                                        <td>{{ $collection->project->name }}</td>
                                        <td>
                                            <!-- Example single danger button -->
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-danger dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    Options
                                                </button>
                                                <ul class="dropdown-menu">
                                                    {{-- <li><a class="dropdown-item"
                                                            href="{{ url('/dashboard/collection/' . $collection->id . '/details') }}">View
                                                            Details</a></li> --}}
                                                    <li><a class="dropdown-item"
                                                            href="{{ url('dashboard/collection/' . $collection->id . '/edit') }}">Edit</a>
                                                    </li>
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                            data-bs-target="#collectionDelete{{ $collection->id }}">Delete</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @include('dashboard.modal.collection-delete')
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
