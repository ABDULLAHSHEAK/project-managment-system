@extends('dashboard.layouts.master')
@section('title')
    Add Expense
@endsection
@section('content')
    <!---- page header -- -- -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12">
                <div class=" px-3 py-3">
                    <div class="row justify-content-between ">
                        <div class="align-items-center col">
                            <h4>Add New Expense</h4>
                        </div>
                        <div class="align-items-center col">
                            <div class="float-end m-0">
                                <span><a href="{{ route('home') }}" style="color: #007bff">Home</a> /
                                    <span>Add Expense</span></span>
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
            <a href="{{ url('dashboard/expense') }}" class="btn btn-success float-end">Back</a>
            <div class="mainForm">
                <div class="row">
                    <div class="col-12 col-md-8 p-1">
                        <div class="card">
                            <div class="card-body">
                                <form method="POST" action="{{ url('dashboard/expense') }}" >
                                    @csrf
                                     <div class="mb-3">
                                        <label for="category_id" class="form-label">Category *</label>
                                        <select id="category_id" name="category_id"
                                            class="form-select @error('category_id') is-invalid @enderror">
                                            <option value="">Select Category</option>
                                            @foreach ($categorys as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    {{-- amount --}}
                                    <div class="mb-3">
                                        <label for="amount" class="form-label">Expense Amount *</label>
                                        <input type="number" id="amount" name="amount"
                                            class="form-control @error('amount') is-invalid @enderror"
                                            placeholder="Enter expense Amount" value="{{ old('amount') }}">
                                        @error('amount')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    {{-- note  --}}

                                    <div class="mb-3">
                                        <label for="note" class="form-label">Remerk *</label>
                                        <textarea id="note" name="note" class="form-control @error('note') is-invalid @enderror"
                                            placeholder="Enter your note">{{ old('note') }}</textarea>
                                        @error('note')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

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
@endsection
