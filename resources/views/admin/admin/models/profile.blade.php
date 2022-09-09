<table class="table table-striped table-responsive-md">

    <tbody>
        <tr>
            <th scope="col">Profile ID</th>
            <td>{{$hotel->id}}</td>
        </tr>
        <tr>
            <th scope="col">Hotel Name</th>
            <td>{{$hotel->name}}</td>
        </tr>
        <tr>
            <th scope="col">Leagal Name</th>
            <td>{{$hotel->leagal_name}}</td>
        </tr>
        <tr>
            <th scope="col">Address</th>
            <td>{{$hotel->address}}</td>
        </tr>
        <tr>
            <th scope="col">Description</th>
            <td
                style="line-height: 22px;
                        vertical-align: middle;
                        width:300px;
                        display:table;
                        white-space: pre-wrap;
                        white-space: -moz-pre-wrap;
                        white-space: -pre-wrap;
                        white-space: -o-pre-wrap;
                        word-wrap: break-word;"
            >
            {{$hotel->description}}
            </td>
            <tr>
                <th scope="col">Hotel Type</th>
                <td>{{$hotel->hotelType->name}}</td>
            </tr>
        </tr>

    </tbody>
</table>