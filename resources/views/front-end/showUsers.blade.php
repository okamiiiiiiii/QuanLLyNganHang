@extends('layouts/app')

@section('content')

    <script type="text/javascript" language="javascript" class="init">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $('#example').DataTable({
                processing: true,
                serverSide: true,
                ajax: function (data, callback, settings) {



                    $.ajax({
                        url: "{{route('get-users')}}",
                        type: 'get',
                        contentType: 'application/x-www-form-urlencoded',
                        data: {
                            RecordsStart: data.start,
                            PageSize: data.length
                        },
                        success: function (data, textStatus, jQxhr) {
                            var Arr = JSON.parse(data);
                            console.log(Arr);
                            callback({
                                data: Arr['data'],
                                recordsTotal: Arr['recordsTotal'],
                                recordsFiltered: Arr['recordsFiltered'],
                            });
                        },
                        error: function (jqXhr, textStatus, errorThrown) {
                        }
                    })
                },

                columns: [
                    {data: 'id'},
                    {data: 'name'},
                    {data: 'email'},
                    {data: 'created_at'},
                    {data: 'updated_at'},
                    {data: 'account_count'},
                        {{--{data: 'name'},--}}
                        {{--    @if(\Illuminate\Support\Facades\Auth::id()==$idUser)--}}
                    {
                        data: null,
                        render: function ( data, type, row ) {
                            var str1 = '<a class="btn btn-success" href="{{url('users')}}' + '/';
                            var str2 = '">Show Account</a>'
                            return str1 + row['id'].toString() + str2;
                        }
                    }
                    {{--@endif--}}
                ]
            })
        })
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
            <th>Number of accounts</th>
            <th>Action</th>
        </tr>

        </thead>

    </table>
    </div>




@endsection
