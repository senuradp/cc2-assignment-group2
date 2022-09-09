@extends('admin.includes.admin')
@section('title', 'Admin Portal - Register')

@section('content')

<div class="form-wrapper">

    <!-- logo -->
    <div id="logo">
        <img style="width: 100%; height:auto;" class="logo" src="/images/logo-header.png" alt="logo">
    </div>
    <!-- ./ logo -->

    
    <h5>Create admin account</h5>

    <!-- form -->
    <form method="POST" action="register">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" value="{{ old('first_name') }}" name="first_name" placeholder="First name" required autofocus>
            @error('first_name')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <input type="text" class="form-control" value="{{ old('last_name') }}" name="last_name" placeholder="Last name" required autofocus>
            @error('last_name')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <input type="text" class="form-control" value="{{ old('username') }}" name="username" placeholder="Username" required autofocus>
            @error('username')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <input type="email" class="form-control" placeholder="Email" name="email" value=" {{ old('email') }} " required>
            @error('email')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" name="password" required>
            @error('password')
                <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Re enter password" name="password_confirmation" required>
            @error('password_confirmation')
                <small id="emailHelp" class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button class="btn btn-primary btn-block">Register</button>
        <hr>
        <p class="text-muted">Already have an account?</p>
        <a href="login" class="btn btn-outline-light">Sign In</a>
    </form>
    <!-- ./ form -->


</div>

@endsection

