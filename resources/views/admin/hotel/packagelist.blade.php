@extends('admin.hotel.includes.dash')
@section('title', 'Packages List')

@section('content')
    <!-- Content -->
    <div class="content">

        <div class="page-header">
            <div class="page-title">
                <h3>Packages List</h3>
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
                                    <th>Total</th>
                                    <th>Description</th>
                                    <th>Rooms</th>
                                    <th>Offers</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                @foreach($packages as $package)
                                  <tr>
                                    <td>{{$package->name}}</td>
                                    <td class="text-right">LKR. {{number_format($package->total,2)}}</td>
                                    <td>{{$package->description}}</td>
                                    <td>{{$package->rooms ? count($package->rooms) : '0'}}</td>
                                    <td>{{$package->offers ? count($package->offers) : '0'}}</td>
                                    <td class="text-right">
                                        <a href="/hotel-portal/edit-packege/{{$package->id}}" class="btn btn-outline-primary btn-sm btn-floating" data-toggle="tooltip" title="" data-original-title="Edit">
                                            <i class="ti-pencil"></i>
                                        </a>
                                        <a onclick="deletePackage({{$package->id}})" class="btn btn-outline-danger btn-sm btn-floating ml-2" data-toggle="tooltip" title="" data-original-title="Delete">
                                            <i class="ti-trash"></i>
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
            'X-CSRF-TOKEN': '{{csrf_token()}}'
        }
    });

    $(document).ready(function (){
        $('#myTable').DataTable();
    });
    function deletePackage(id){
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover !",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                //ajax
                $.ajax({
                    type:'POST',
                    url:'/hotel-portal/remove-packege',
                    data:{
                        'id' : id,
                    },
                    success:function(data) {
                        if(data='success'){
                            swal(
                                'Deleted!',
                                'Your package has been deleted.',
                                'success'
                            ).then(()=>{
                                location.reload();
                            });
                        }else{
                            swal(
                                'Delete error!',
                                'Your package has not been deleted.',
                                'error'
                            ).then(()=>{
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
