@extends('dashboard.layouts.master')
@section('title')
   Expense Details
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class=" px-3 py-3">
                    <div class="row justify-content-between ">
                        <div class="align-items-center col">
                            <h4>Details</h4>
                        </div>
                        <div class="align-items-center col">
                            <div class="float-end m-0">
                                <span><a href="index.html" style="color: #007bff">Home</a> /
                                    <span>Expense Profile</span></span>
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
                    <a href="{{ url('dashboard/expense-category') }}" class="btn btn-success float-end">Back</a>
                    <div class="col-12 col-md-8 p-1">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <ul style="font-size: 16px;font-weight:200">
                                            <li style="list-style: none"><b>Category Name :</b> {{$data->category->name}}</li>
                                            <li style="list-style: none"><b>Expense Amount :</b> {{$data->amount}}</li>
                                            <li style="list-style: none"><b>Date :</b> <p>{{$data->date}}</p></li>
                                            <li style="list-style: none"><b>Note :</b> <p>{{$data->note}}</p></li>
                                        </ul>
                                    </div>
                                </div>
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
