@extends('fontend.layouts.master')

@section('content')

 <div class="login-container">
  <form method="POST" action="{{ route('password.email') }}" class="border p-4 rounded shadow-sm" style="width: 400px;">
    @csrf
   <h4 class="text-center mb-4">Forgot-Password</h4>
   <div class="mb-3">
    <label for="inputEmail" class="form-label">Email address</label>
    <input type="email" name="email" id="email" class="form-control" placeholder="Enter email">
   </div>
   <button type="submit" class="btn btn-primary d-block w-100 mb-3">Send Password Reset Link</button>
  </form>
 </div>

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
