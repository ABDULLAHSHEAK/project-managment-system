@extends('dashboard.layouts.master')
@section('title')
    All Note
@endsection
@section('content')
    <!---- page header -- -- -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class=" px-3 py-3">
                    <div class="row justify-content-between ">
                        <div class="align-items-center col">
                            <h4>Note Page</h4>
                        </div>
                        <div class="align-items-center col">
                            <div class="float-end m-0">
                                <span><a href="index.html" style="color: #007bff">Home</a> /
                                    <span>Note</span></span>
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
            <a href="{{ url('dashboard/note/create') }}" class="btn btn-success float-end">Add Note</a>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tableData" class="table">
                            <thead class="bg-gradient-light">
                                <tr>
                                    <th>NO:</th>
                                    <th>File</th>
                                    <th>Note</th>
                                    <th>Project Name</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $note)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img src="{{ asset('image/file') }}/{{ $note->file }}" alt="note file"
                                                width="40"></td>
                                        <td>{{ $note->note }}</td>
                                        <td>{{ $note->project->name }}</td>
                                        <td>{{ $note->created_at->diffForHumans() }}</td>
                                        <td>
                                            <!-- Example single danger button -->
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-danger dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    Options
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="{{url('/dashboard/note/'.$note->id.'/details')}}">View Details</a></li>
                                                    <li><a class="dropdown-item"
                                                            href="{{ url('dashboard/note/' . $note->id . '/edit') }}">Edit</a>
                                                    </li>
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                            data-bs-target="#NoteDelete{{$note->id}}">Delete</a></li>
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


        </div>
    </div>
    <hr>
@endsection
