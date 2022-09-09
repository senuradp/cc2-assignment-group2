@extends('admin.includes.admin')
@section('title', 'Recovery')

@section('content')
<div class="form-wrapper">

     <!-- logo -->
     <div id="logo">
        <img style="width: 100%; height:auto;" class="logo" src="/images/logo-header.png" alt="logo">
    </div>
    <!-- ./ logo -->

    
    <h5>Reset password</h5>

    <!-- form -->
    <form action="/hotel-portal/recover" method="POST">
        @csrf
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Enter email" name="email" value="{{ old('email') }}" required autofocus>
            @error('email')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button class="btn btn-primary btn-block">Get Link</button>
        <hr>
        <p class="text-muted">Take a different action.</p>
        <a href="login" class="btn btn-outline-light ml-1">Sign In</a>
    </form>
    <!-- ./ form -->


</div>

@endsection

@section('scripts')

<script>

    toastr.options = {
        timeOut: 3000,
        progressBar: true,
        showMethod: "slideDown",
        hideMethod: "slideUp",
        showDuration: 200,
        hideDuration: 200
    };

    $(document).ready(function() {
                    
                        @if(session()->has('error'))
                                
                                toastr.error('{{ session()->get('error') }}');
                           
                        @endif
                    
                        @if(session()->has('success'))
                            toastr.success('{{ session()->get('success') }}');
                        @endif

    });
</script>

@endsection