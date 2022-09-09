@extends('web.includes.layout')
@section('title', 'HelaView - Recover account')

@section('content')

{{-- login  --}}
    <section class="login-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="login-box">
                        <div class="login-top">
                            <h3>Recover Your Account</h3>
                            <p>Please enter your email then we will send you the recovery link</p>
                        </div>
                        <form class="login-form" action="/recover" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 email">
                                    <label>Email</label>
                                    @error('email')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                    <input type="email" name="email" placeholder="Enter your email here" value="{{ old('email') }}" required>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" name="button">Get Link</button>
                                </div>
                            </div>
                        </form>

                        <div class="login-btm text-center mt-4">
                            <p>Do you remember the password ? <a href="./login">Sign in</a></p>
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
