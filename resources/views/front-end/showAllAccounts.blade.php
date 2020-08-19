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
                        url: "{{route('get-all-accounts')}}",
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
            </tr>
            </thead>
        </table>
    </div>>


@endsection
