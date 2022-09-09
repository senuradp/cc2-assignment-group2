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
                            <h3>Update Password</h3>
                            <p>Enter new password for your account</p>
                        </div>
                        <form class="login-form" action="/reset" method="POST">
                            @csrf
                            <input type="hidden" name="token" value="{{Request::segment(2)}}">
                            <div class="row">
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
                                <div class="col-md-12">
                                    <button type="submit" name="button">Update</button>
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