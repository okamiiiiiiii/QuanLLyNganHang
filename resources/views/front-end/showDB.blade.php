@extends('layouts/app')

@section('content')

    <script>
        $(document).ready( function () {
            $('#example').DataTable();
        } );
    </script>

    <div class="container">

    <table class="table" id="example">

        <thead class="thead-light">
        <tr>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Action</th>
        </tr>

        </thead>

        <tbody>
            @foreach($users as $key => $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at}}</td>
                        <td>{{$user->updated_at}}</td>
                    <td>

                        <!-- show the nerd (uses the show method found at GET /nerds/{id} -->
                        <a class="btn btn-small btn-success" href="{{ url('users/' . $user->id) }}">Show Accounts</a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>




@endsection
