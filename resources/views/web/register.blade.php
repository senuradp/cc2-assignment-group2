@extends('web.includes.layout')
@section('title', 'HelaView - Hotels')

@section('content')

{{-- register --}}
    <section class="login-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="login-box">
                        <div class="login-top">
                            <h3>Create An Account.</h3>
                            <p>To continue booking please create new account</p>
                        </div>
                        <form class="login-form" action="/register" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 email">
                                    <label>First Name</label>
                                    @error('first_name')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                    <input type="text" name="first_name" placeholder="Enter first name here" value="{{ old('first_name') }}" required>
                                </div>
                                <div class="col-md-6 email">
                                    <label>Last Name</label>
                                    @error('last_name')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                    <input type="text" name="last_name" placeholder="Enter last name here" value="{{ old('last_name') }}" required>
                                </div>
                                <div class="col-md-12 email">
                                    <label>Email</label>
                                    @error('email')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                    <input type="email" name="email" placeholder="Enter Email here" value="{{ old('email') }}" required>
                                </div>
                                <div class="col-md-12 password">
                                    <label>Password</label>
                                    @error('password')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                    <input type="password" name="password" placeholder="Enter your password here" required>
                                </div>
                                <div class="col-md-12 password">
                                    <label>Retype Password</label>
                                    <input type="password" name="password_confirmation" placeholder="Enter your password again" required>
                                </div>
                                <div class="col-md-12 chqbox chqbox2">
                                    <input type="checkbox" name="terms" id="term" required>
                                    <label for="term">I have read &amp; agree with <span>Terms &amp;
                                            Conditions</span>.</label>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" name="button">Create Account</button>
                                </div>
                            </div>
                        </form>
                         {{-- social login --}}
                        <div class="login-btm text-center">
                            <p>or sign up with</p>
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item"><a href="{{ route('social.oauth', 'google') }}"><i class="fab fa-google"></i></a></li>
                                <li class="list-inline-item"><a href="{{ route('social.oauth', 'facebook') }}"><i class="fab fa-facebook"></i></a></li>
                            </ul>
                        </div>
                        <div class="login-btm text-center mt-4">
                            <p>Already have an account ? <a href="./login">Sign in</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
