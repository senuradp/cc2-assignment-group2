@extends('admin.hotel.includes.dash')
@section('title', 'Hotel Profile')

@section('content')
    <!-- Content -->
    <div class="content">

        <div class="page-header">
            <div class="page-title">
                <h3>Users List</span></h3>
            </div>
        </div>

        <table id="myTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>example@gmail.com</td>
                </tr>
                ...
            </tbody>
        </table>
    </div>
    <!-- ./ Content -->


@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

@endsection
