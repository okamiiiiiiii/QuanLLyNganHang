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
                    console.log(data);


                    $.ajax({
                        url: "{{route('get-accounts',$idUser)}}",
                        type: 'get',
                        contentType: 'application/x-www-form-urlencoded',
                        data: {
                            RecordsStart: data.start,
                            PageSize: data.length
                        },
                        success: function (data, textStatus, jQxhr) {
                            var Arr = JSON.parse(data);
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
                    {data: 'Code'},
                    {data: 'Balance', render: $.fn.dataTable.render.number( ',', '.', 0, '$' )},
                    {data: 'name'},
                        @if(\Illuminate\Support\Facades\Auth::id()==$idUser)
                    {
                        //adds td row for button
                        data: null,
                        render: function ( data, type, row ) {
                            var editStr1 = '<a class="btn btn-info" href="{{url('users/'.$idUser.'/editAccount')}}' + '/';
                            var editStr3 = '">Edit</a>'
                            var editStr = editStr1 + row['id'].toString() + editStr3;
                            var delStr1 = '<a class="btn btn-danger" onclick="return confirm(' + '\'Are you sure?\'' + ')" href="{{url('users/'.$idUser.'/delAccount')}}' + '/';
                            var delStr3 = '">Delete</a>'
                            var delStr = delStr1 + row['id'].toString() + delStr3;
                            return editStr + delStr;
                        }
                    }
                    @endif
                ]
            })
        })


    </script>



    <div class="container">
        <table class="table" id="example">
            <thead class="thead-light">
            <tr>
                <th>Id</th>
                <th>Code</th>
                <th>Balance</th>
                <th>User</th>
                @if(\Illuminate\Support\Facades\Auth::id()==$idUser)
                <th>Action</th>
                @endif
            </tr>
            </thead>
        </table>
        @if(\Illuminate\Support\Facades\Auth::id()==$idUser)
        <a class="btn btn-small btn-success" href="{{url('users/'.$idUser.'/createAccount') }}" id="CreateButton">Create new Account</a>
        @endif
    </div>>


@endsection






