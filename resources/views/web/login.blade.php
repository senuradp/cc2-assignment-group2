@extends('web.includes.layout')
@section('title', 'HelaView - Hotels')

@section('content')

{{-- login  --}}
    <section class="login-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="login-box">
                        <div class="login-top">
                            <h3>Welcome Back.</h3>
                            <p>Please login before confirming the booking</p>
                        </div>
                        <form class="login-form" action="/login" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 email">
                                    <label>Email</label>
                                    @error('email')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                    <input type="email" name="email" placeholder="Enter your email here" value="{{ old('email') }}" required>
                                </div>
                                <div class="col-md-12 password">
                                    <label>Password</label>
                                    @error('password')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                    <input type="password" name="password" placeholder="Enter password" required>
                                </div>
                                <div class="col-md-12 d-flex justify-content-between">
                                    <div class="chqbox">
                                        <input type="checkbox" name="rememberme" id="rmme">
                                        <label for="rmme">Remember Me</label>
                                    </div>
                                    <div class="forget-btn">
                                        <a href="/recover">Forgot Password?</a>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" name="button">Sign In</button>
                                </div>
                            </div>
                        </form>
                        {{-- social login --}}
                        <div class="login-btm text-center">
                            <p>or sign in with</p>
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item"><a href="{{ route('social.oauth', 'google') }}"><i class="fab fa-google"></i></a></li>
                                <li class="list-inline-item"><a href="{{ route('social.oauth', 'facebook') }}"><i class="fab fa-facebook"></i></a></li>
                            </ul>
                        </div>
                        <div class="login-btm text-center mt-4">
                            <p>Don't have an account ? <a href="./register">Sign up</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
