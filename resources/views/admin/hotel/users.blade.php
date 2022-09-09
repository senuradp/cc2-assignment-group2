@extends('admin.hotel.includes.dash')
@section('title', 'Hotel Profile')

@section('content')
    <!-- Content -->
    <div class="content">

        <div class="page-header">
            <div class="page-title">
                <h3>Users</h3>
            </div>
        </div>
            {{-- name --}}
            <div class="row">
                <div class="col-lg-!2 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Add User</h6>
                            <div class="row">
                                <div class="col-md-12">
                                    <form>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="inputEmail4">Email</label>
                                                <input type="name" class="form-control" id="inputEmail4"
                                                    placeholder="Email">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Invite</button>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- ./ Content -->

@endsection

@section('scripts')

@endsection
