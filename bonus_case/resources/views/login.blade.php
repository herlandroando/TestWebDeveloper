@extends('layouts.main')

@section('title', 'Login')

@push('styles')
    <style>
        .container-login {
            background-color: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width: 100%;
        }

        .container-form-login {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.2);
        }
    </style>
@endpush

@section('content')
    <div class="container-login">
        <div class="container-form-login">
            <form action="{{ route('login.authenticate') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        id="email" aria-describedby="emailHelp" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    @if (session('error'))
                        <div class="invalid-feedback">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input name="password" type="password"
                        class="form-control @error('password') is-invalid @enderror" id="password">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    @if (session('error'))
                        <div class="invalid-feedback">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
@endsection
