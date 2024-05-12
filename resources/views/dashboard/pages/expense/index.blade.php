@extends('dashboard.layouts.master')
@section('title')
    Expense 
@endsection
@section('content')
    <!---- page header -- -- -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class=" px-3 py-3">
                    <div class="row justify-content-between ">
                        <div class="align-items-center col">
                            <h4>All Expense </h4>
                        </div>
                        <div class="align-items-center col">
                            <div class="float-end m-0">
                                <span><a href="{{ route('home') }}" style="color: #007bff">Home</a> /
                                    <span>Expense </span></span>
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
                <a href="{{url('dashboard/expense/create')}}" class="btn btn-success">Add Expense </a>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="tableData" class="table">
                            <thead class="bg-gradient-light">
                                <tr>
                                    <th>NO:</th>
                                    <th>Category</th>
                                    <th>Amount</th>
                                    <th>ReMerk</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $expense)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $expense->category->name }}</td>
                                        <td>{{ $expense->amount}}</td>
                                        <td>{{ implode(' ', array_slice(str_word_count($expense->note, 1), 0, 5)) }}</td>

                                        <td>{{$expense->date}}</td>
                                        <td>
                                             <!-- Example single danger button -->
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-danger dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    Options
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="{{url('dashboard/expense/' . $expense->id.'/details')}}">View Details</a></li>
                                                    <li><a class="dropdown-item"
                                                            href="{{ url('dashboard/expense/' . $expense->id.'/edit') }}">Edit</a>
                                                    </li>
                                                    <li>
                                                        <hr class="dropdown-divider">
                                                    </li>
                                                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                            data-bs-target="#expenseDelete{{ $expense->id }}">Delete</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                  @include('dashboard.modal.expense-delete')
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
