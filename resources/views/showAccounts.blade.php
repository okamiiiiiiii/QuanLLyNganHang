@extends('layouts/app')



@section('content')
    <div class="container">
        <table class="table" id="example">
            <thead class="thead-light">
            <tr>
                <th>Id</th>
                <th>Code</th>
                <th>Balance</th>
                <th>Action</th>


            </tr>
            </thead>
        <tbody>
            @foreach($accounts as $key => $account)
            <tr>
                <td>{{$account->id}}</td>
                    <td>{{$account->Code}}</td>
                    <td>{{$account->Balance}}</td>

                <td><a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{url('users/'.$idUser.'/delAccount/'.$account->id)}}">Delete<i class="fa fa-trash"></i></a>
                        <a class="btn btn-info" href="{{url('users/'.$idUser.'/editAccount/'.$account->id)}}">Edit<i class="fa fa-trash"></i></a></td>

                </tr>
            @endforeach

            </tbody>
        </table>
        {{ $accounts->links() }}
        @if(\Illuminate\Support\Facades\Auth::id()==$idUser)
            <a class="btn btn-small btn-success" href="{{url('users/'.$idUser.'/addAccount') }}" id="CreateButton">Create new Account</a>
        @endif
    </div>>


@endsection






