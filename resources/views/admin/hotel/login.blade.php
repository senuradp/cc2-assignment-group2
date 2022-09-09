@extends('admin.includes.admin')
@section('title', 'Hotel protal - Login')

@section('content')

<div class="form-wrapper">

    <!-- logo -->
    <div id="logo">
        <img style="width: 100%; height:auto;" class="logo" src="/images/logo-header.png" alt="logo">
    </div>
    <!-- ./ logo -->


    <h5>Sign in to the hotel</h5>

    <!-- form -->
    <form method="POST" action="login">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" placeholder="email" name="email" value="{{ old('email') }}" required autofocus>
            @error('email')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" name="password" placeholder="Password" required>
            @error('password')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group d-flex justify-content-between align-items-center">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" checked="" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember me</label>
            </div>
            <a class="small" href="./recover">Reset password</a>
        </div>
        <button class="btn btn-primary btn-block">Sign in</button>

        <hr>
        <p class="text-muted">Don't have an account?</p>
        <a href="./register" class="btn btn-outline-light">Register now!</a>
    </form>
    <!-- ./ form -->


</div>

@endsection
