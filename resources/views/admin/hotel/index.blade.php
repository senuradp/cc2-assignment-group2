    @extends('admin.hotel.includes.dash')
    @section('title', 'Home')

    @section('content')
        <!-- Content -->
        <div class="content">

            <div class="page-header">
                <div class="page-title">
                    <h3>Account infomation</h3>
                </div>
            </div>

            {{-- name --}}
            <div class="row">
                <div class="col-lg-!2 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Change your name</h6>
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="/hotel-portal/update-name" method="POST">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="first_name">First Name</label>
                                                <input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name" value="{{ Auth::user('hotel')->first_name }}">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="last_name">Last Name</label>
                                                <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name" value="{{ Auth::user('hotel')->last_name }}">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

            {{-- password --}}
            <div class="row">
                <div class="col-lg-!2 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Change your password</h6>
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="/hotel-portal/update-password" method="POST">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="old_password" class="col-sm-2 col-form-label">Old Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" name="old_password" class="form-control" id="old_password" placeholder="Password" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password" class="col-sm-2 col-form-label">New Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password_confirmation" class="col-sm-2 col-form-label">Re-Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm Password" required>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>





        </div>
        <!-- ./ Content -->

    @endsection

    @section('scripts')
        <script>
                        @if(session()->has('error'))
                                
                                toastr.error('{{ session()->get('error') }}');
                           
                        @endif
                    
                        @if(session()->has('success'))
                            toastr.success('{{ session()->get('success') }}');
                        @endif

                        @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        toastr.error('{{ $error }}');
                                    @endforeach       
                        @endif
        </script>
    @endsection
