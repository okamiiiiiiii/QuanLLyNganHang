@extends('layouts/app')


@section('content')
    <div class="container">
    <form method="post" action="{{\Illuminate\Support\Facades\URL::current().'/store'}}">
        @csrf
        <div class="form-group">
            <label >Code:</label>
            <input type="text" class="form-control" placeholder="Account's code" name="code">
            <label >Balance:</label>
            <input type="text" class="form-control" placeholder="Account's balance" name="balance">
            <br>
            <button type="submit" class="btn btn-primary">Create new account </button>
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


