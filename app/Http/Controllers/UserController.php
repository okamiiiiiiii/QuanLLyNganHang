<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;



class UserController extends Controller
{


    public function index()
    {
        $users = User::all();
        return view('front-end/showUsers');
    }

    public function getJSON(Request $request)
    {
        $Start = $request->input('RecordsStart');
        $Limit = $request->input('PageSize');

        $users = User::select('users.id', 'name', 'email', 'users.created_at', 'users.updated_at')->withCount('Account')
            ->with('Account')
            ->offset($Start)
            ->limit($Limit)
            ->groupBy('users.id')
            ->get();


        $countFilter = count($users);
        $countTotal = User::count();

        $output = array(
            "recordsTotal" => $countTotal,
            "recordsFiltered" => $countFilter,
            "data" => $users,
        );
        $json = json_encode($output);
        echo $json;

    }
}
