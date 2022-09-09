@extends('admin.admin.includes.dash')
@section('title', 'Home')

@section('content')
    <!-- Content -->
    <div class="content">

        <div class="page-header">
            <div class="page-title">
                <h3>Admins List</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-!2 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="myTable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($adminlists as $admin)
                                        <tr>
                                            <td>{{ $admin['first_name'] }}</td>
                                            <td>{{ $admin['last_name'] }}</td>
                                            <td>{{ $admin['email'] }}</td>
                                            <td>
                                                @if ($admin->status == 1)
                                                    <span class="badge bg-success text-white">Active</span>
                                                @else
                                                    <span class="badge bg-danger text-white">Deactive</span>
                                                @endif
                                            </td>


                                            <td class="text-right">
                                                @if($admin->email!="admin@manakal.com")
                                                    @if ($admin->status == 1)
                                                        <a onclick="deleteAdmin({{ $admin->id }})"
                                                            class="btn btn-outline-danger btn-sm btn-floating ml-2"
                                                            data-toggle="tooltip" title="" data-original-title="Deactive">
                                                            <i class="ti-minus"></i>
                                                        </a>
                                                    @else

                                                        <a onclick="addAdmin({{ $admin->id }})"
                                                            class="btn btn-outline-danger btn-sm btn-floating ml-2"
                                                            data-toggle="tooltip" title="" data-original-title="Active">
                                                            <i class="ti-plus"></i>
                                                        </a>
                                                    @endif
                                                @endif
                                                </a>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        $(document).ready(function() {
            $('#myTable').DataTable();
        });

        function deleteAdmin(id) {
            swal({
                title: "Are you sure?",
                // text: "Once deactivate, y !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    //ajax
                    $.ajax({
                        type: 'POST',
                        url: '/site-admin/delete-admin',
                        data: {
                            'id': id,
                        },
                        success: function(data) {
                            if (data = 'success') {
                                swal(
                                    'Deactivated!',
                                    'Admin has been Deactivated.',
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            } else {
                                swal(
                                    'Deactivate error!',
                                    'Admin has not been Deactivated.',
                                    'error'
                                ).then(() => {
                                    location.reload();
                                });
                            }
                        }
                    });
                } else {
                    swal("Your request has been cancelled !", {
                        icon: "error",
                    });
                }
            });
        }

        function addAdmin(id) {
            swal({
                title: "Are you sure?",
                // text: "Once deleted, you will not be able to recover !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    //ajax
                    $.ajax({
                        type: 'POST',
                        url: '/site-admin/add-admin',
                        data: {
                            'id': id,
                        },
                        success: function(data) {
                            if (data = 'success') {
                                swal(
                                    'Activated!',
                                    'Admin has been activated.',
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            } else {
                                swal(
                                    'Activate error!',
                                    'Admin has not been activated.',
                                    'error'
                                ).then(() => {
                                    location.reload();
                                });
                            }
                        }
                    });
                } else {
                    swal("Your request has been cancelled !", {
                        icon: "error",
                    });
                }
            });
        }
    </script>
@endsection
