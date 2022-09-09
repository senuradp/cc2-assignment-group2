@extends('web.includes.layout')
@section('title', 'HelaView - Home')

@section('content')

    <!-- =======================
                                     Banner innerpage -->
    <div class="innerpage-banner left bg-overlay-dark-7 py-7"
        style="background:url(images/07.jpg) repeat; background-size:cover;">
        <div class="container">
            <div class="row all-text-white">
                <div class="col-md-12 align-self-center">
                    <h1 class="innerpage-title">Contact Us</h1>

                </div>
            </div>
        </div>
    </div>
    <!-- =======================
                                     Banner innerpage -->

    <section class="pt80 pb80 booking-section login-area">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-md-6 col-sm-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="login-box Booking-box">
                                <div class="login-top">
                                    <h3>Your Personal Information</h3>
                                    <p>Need to get in touch with us? Fill out the form with your inquiry,
                                        we will contact you as soon as possible!
                                    </p>
                                </div>
                                <form class="login-form" action="/contact-us-send" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 col-sm-12 email">
                                            <label>First Name</label>
                                            @error('first_name')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                            <input type="text" name="first_name" placeholder="First Name"
                                                value="{{ old('first_name') }}" required>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12 email">
                                            <label>Last Name</label>
                                            @error('last_name')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                            <input type="text" name="last_name" placeholder="Last Name"
                                                value="{{ old('last_name') }}" required>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12 email">
                                            <label>Email</label>
                                            @error('email')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                            <input type="text" name="email" placeholder="Enter your email here"
                                                value="{{ old('email') }}" required>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-sm-12 password">
                                            <label>Phone Number</label>
                                            @error('contact_number')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                            <input type="text" name="contact_number" placeholder="Enter Phone Number"
                                                value="{{ old('contact_number') }}" required>
                                        </div>

                                        <div class="form-group col-md-12">
                                            <label>Message</label>
                                            @error('message')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                            <textarea class="form-control" name="message" rows="4" placeholder="Enter your message here"
                                                value="{{ old('message') }}" required></textarea>
                                        </div>

                                        <div class="col-md-12 d-flex justify-content-between">
                                            <div class="chqbox">
                                                <input type="checkbox" name="rememberme" id="rmme">
                                                <label for="rmme"> I want to receive manakal promotional offers in the
                                                    future</label>
                                            </div>
                                        </div>

                                        <div class="col-md-12 d-flex justify-content-between">
                                            <div class="chqbox">
                                                <input type="checkbox" name="rememberme" id="rmme">
                                                <label for="rmme"> By continuing, you agree to the Terms and
                                                    Conditions.</label>
                                            </div>
                                        </div>

                                        <div class="col-md-12 mt-4">
                                            <div class="row d-flex justify-content-center">

                                                <div class="g-recaptcha"
                                                    data-sitekey="{{ config('services.recaptcha.key') }}"></div>
                                                @if (Session::has('g-recaptcha-response'))
                                                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">
                                                        {{ Session::get('g-recaptcha-response') }}
                                                    </p>
                                                @endif
                                                <br>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row d-flex justify-content-center">
                                                <div class="col-md-6">
                                                    <button class="Confirm" type="submit" name="button">Submit
                                                        form</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>



@endsection

@section('scripts')

<script>
    $(document).ready(function() {

        @if (session()->has('success'))
            toastr.success('{{ session('success') }}');
        @endif 

        @if (session()->has('error'))
            toastr.error('{{ session('error') }}');
        @endif 

    });
</script>

@endsection
