@extends('layouts.master')
@section('title', 'Register Page')
@section('contents')
    <div class="login-form">
        <form action="{{ route('auth#RegisterPage') }}" method="post">
            @csrf
            @error('terms')
                <small class="text-danger">{{ $message }}</small>
            @enderror
            <div class="form-group">
                <label>Username</label>
                <input class="au-input au-input--full  @error('name') is-invalid @enderror" type="text" name="name"
                    placeholder="Username">
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Email Address</label>
                <input class="au-input au-input--full  @error('email') is-invalid @enderror" type="email" name="email"
                    placeholder="Email">
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Phone</label>
                <input class="au-input au-input--full  @error('phone') is-invalid @enderror" type="number" name="phone"
                    placeholder="Phone">
                @error('phone')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Gender</label>
                <select name="gender" class="form-control" id="" >
                    <option value="">Choose Gender...</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                @error('gender')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Address</label>
                <input class="au-input au-input--full  @error('address') is-invalid @enderror" type="text" name="address"
                    placeholder="Address">
                @error('address')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label>Password</label>
                <input class="au-input au-input--full @error('password') is-invalid @enderror" type="password"
                    name="password" placeholder="Password">
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group">
                <label>Password</label>
                <input class="au-input au-input--full @error('password_confirmation') is-invalid @enderror" type="password"
                    name="password_confirmation" placeholder="Confirm Password">
                @error('password_confirmation')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">register</button>

        </form>
        <div class="register-link">
            <p>
                Already have account?
                <a href="{{ route('auth#LoginPage') }}">Sign In</a>
            </p>
        </div>
    </div>
@endsection
