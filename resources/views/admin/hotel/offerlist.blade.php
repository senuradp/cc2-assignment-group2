@extends('admin.hotel.includes.dash')
@section('title', 'Offers List')

@section('content')
    <!-- Content -->
    <div class="content">

        <div class="page-header">
            <div class="page-title">
                <h3>Offers List</h3>
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
                                    <th>Discount</th>
                                    <th>Expire date</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                @foreach($offers as $offer)
                                  <tr>
                                    <td>{{$offer->name}}</td>
                                    <td>{{$offer->discount}}</td>
                                    <td>{{$offer->expires_at}}</td>
                                    <td class="text-right">
                                        <a href="/hotel-portal/add-offer/{{$offer->id}}" class="btn btn-outline-primary btn-sm btn-floating" data-toggle="tooltip" title="" data-original-title="Edit">
                                            <i class="ti-pencil"></i>
                                        </a>
                                        <a onclick="deletePackage({{$offer->id}})" class="btn btn-outline-danger btn-sm btn-floating ml-2" data-toggle="tooltip" title="" data-original-title="Delete">
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
                    url:'/hotel-portal/remove-offer',
                    data:{
                        'id' : id,
                    },
                    success:function(data) {
                        if(data='success'){
                            swal(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            ).then(()=>{
                                location.reload();
                            });
                        }else{
                            swal(
                                'Delete error!',
                                'Your file has not been deleted.',
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
