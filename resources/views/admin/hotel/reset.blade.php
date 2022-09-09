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
    <form action="/hotel-portal/reset" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{Request::segment(3)}}">
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
        <button class="btn btn-primary btn-block">Submit</button>
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