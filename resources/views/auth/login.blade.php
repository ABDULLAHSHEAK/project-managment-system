@extends('fontend.layouts.master')

@section('content')
    <div class="login-container">
        <form class="border p-4 rounded shadow-sm" style="width: 400px;" method="POST" action="{{ route('login') }}">
            @csrf
            <h3 class="text-center mb-4">Login</h3>
            <div class="mb-3">
                <label for="inputEmail" class="form-label">Email address</label>
                <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    placeholder="Enter email" value="abir@gmail.com">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label">Password</label>
                <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    placeholder="Password" value="abir@gmail.com">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label" for="rememberMe">Remember me</label>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            <div class="text-center">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-decoration-none me-3">Forgot Password?</a>
                @endif
                <span class="text-muted">|</span>
                <a href="{{ route('register') }}" class="text-decoration-none ms-3">Sign Up</a>
            </div>
        </form>
    </div>


@endsection
