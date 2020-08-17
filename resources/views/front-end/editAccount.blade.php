@extends('layouts/app')

@section('content')
    <div class="container">
    <form method="post" action="{{\Illuminate\Support\Facades\URL::current().'/edit'}}">
        @csrf
        <div class="form-group">
            <label >Code:</label>
            <input type="text" class="form-control" placeholder="Account's code" name="code" value="{{$account->Code }}">
            <label >Balance:</label>
            <input type="text" class="form-control" placeholder="Account's balance" name="balance" value="{{$account->Balance}}">
            <br>
            <button type="submit" class="btn btn-primary">Edit this account</button>
        </div>

    </form>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </div>




@endsection
