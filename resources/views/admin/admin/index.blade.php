@extends('admin.admin.includes.dash')
@section('title', 'Home')

@section('content')
    <!-- Content -->
    <div class="content">

        <div class="page-header">
            <div class="page-title">
                <h3>Profiles</h3>
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
                                        <th>Name</th>
                                        <th>Legal Name</th>
                                        <th>Contact</th>
                                        <th>Address</th>
                                        <th>Admin Contact</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($hotels as $hotel)
                                        <tr>
                                            {{-- {{ $row['id'] }} --}}
                                            <td>{{ $hotel->name }}</td>
                                            <td>{{ $hotel->leagal_name }}</td>
                                            <td>{{ isset($hotel->contacts) ? $hotel->contacts[0] : 'N/A' }}</td>
                                            <td>{{ $hotel->address }}</td>
                                            <td>{{ $hotel->users->first()->email }}</td>
                                            <td class="text-center">
                                                <a href="javascript:void(0)" 
                                                    onclick="viewProfile({{ $hotel->id }})"
                                                    class="btn btn-outline-success btn-sm btn-floating mr-2 view-btn" data-original-title="View">
                                                    <i class="ti-eye"></i>
                                                </a>
                                                <a onclick="approveHotel({{ $hotel->id }})"
                                                    class="btn btn-outline-primary btn-sm btn-floating mr-2"
                                                    data-toggle="tooltip" title="" data-original-title="Approve">
                                                    <i class="ti-thumb-up"></i>
                                                </a>
                                                <a onclick="rejectHotel({{ $hotel->id }})"
                                                    class="btn btn-outline-danger btn-sm btn-floating" data-toggle="tooltip"
                                                    title="" data-original-title="Reject">
                                                    <i class="ti-thumb-down"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{-- {{ $data->links() }} --}}
                        </div>
                    </div>
                    {{-- modal start --}}
                    <div class="modal" tabindex="-1" id="detailModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Profile Details</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" id="modal-body">
                                    
                                    {{-- <p><strong>Profile ID:</strong> <span id="hotel-id"></span></p>
                                    <p><strong>Hotel Name:</strong> <span id="hotel-name"></span></p>
                                    <p><strong>Address   :</strong> <span id="hotel-add"></span></p> --}}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- modal end --}}
                </div>
            </div>
        </div>

    </div>
    <!-- ./ Content -->

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        });

        function approveHotel(id) {
            swal({
                title: "Admin approval",
                text: "Do you want to approve this hotel profile ?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((res) => {
                if (res) {
                    $.ajax({
                        type: 'POST',
                        url: '/site-admin/approve-hotel',
                        data: {
                            'id': id,
                        },
                        success: function(data) {
                            if (data = 'success') {
                                swal(
                                    'Approved!',
                                    'Hotel Profile has been approved.',
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            } else {
                                swal(
                                    'Approve error!',
                                    'server error',
                                    'error'
                                ).then(() => {
                                    location.reload();
                                });
                            }
                        }
                    });
                } else {
                    swal("No changes have been made !", {
                        icon: "error",
                    });
                }
            });
        }

        function rejectHotel(profile_id) {
            swal({
                title: "Are you sure?",
                text: "Once rejected, you will not be able to approve again !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willReject) => {
                if (willReject) {
                    //ajax
                    $.ajax({
                        type: 'POST',
                        url: '/site-admin/reject-hotel',
                        data: {
                            'id': profile_id,
                        },
                        success: function(data) {
                            if (data = 'success') {
                                swal(
                                    'Rejected!',
                                    'Hotel Profile has been rejected.',
                                    'success'
                                ).then(() => {
                                    location.reload();
                                });
                            } else {
                                swal(
                                    'rejection error!',
                                    'Profile is not rejected.',
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

        function viewProfile(id){
            $.ajax({
                type: 'POST',
                url: '/site-admin/hotels-view',
                data: {
                    'id': id,
                },
                success: function(data) {
                    $("#modal-body").html(data);
                    $('#detailModal').modal('show');
                }
            });
        }
       
    </script>
@endsection
