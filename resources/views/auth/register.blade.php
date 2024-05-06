@extends('fontend.layouts.master')

@section('content')
    <div class="login-container">
        <form method="POST" action="{{ route('register') }}" class="border p-4 rounded shadow-sm" style="width: 400px;">
            @csrf
            <h2 class="text-center mb-4">Singup</h2>
            <div class="mb-3">
                <label for="inputEmail" class="form-label">First Name</label>
                <input type="text" id="first_name" name="first_name" class="form-control @error('first_name') is-invalid @enderror"
                    placeholder="Enter Your First Name" value="{{ old('first_name') }}">
                @error('first_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputEmail" class="form-label">Last Name</label>
                <input type="text" id="last_name" name="last_name" class="form-control @error('last_name') is-invalid @enderror"
                    placeholder="Enter Your Last Name" value="{{ old('last_name') }}">
                @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputEmail" class="form-label">Email address</label>
                <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    placeholder="Enter Your Email" value="{{ old('email') }}">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputEmail" class="form-label">Mobile Number</label>
                <input type="text" id="number" name="number" class="form-control @error('number') is-invalid @enderror"
                    placeholder="Enter Your Phone Number" value="{{ old('number') }}">
                @error('number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword"
                    placeholder="Password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary d-block w-100 mb-3">Singup</button>
            <div class="text-center">

                <span class="text-muted">already singup ? |</span>
                <a href="{{ route('login') }}" class="text-decoration-none ms-3">Login</a>
            </div>
        </form>
    </div>

@endsection
