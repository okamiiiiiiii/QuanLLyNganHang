<?php

namespace App\Http\Controllers;

use App\Models\Accounts;
use App\Services\UserService;
use App\Services\UserInterface;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\Routing\Matcher\RedirectableUrlMatcher;


class UserController extends Controller
{


    public function index()
    {
        $users = User::all();

        return view('front-end/showDB',compact('users'));
    }

    public function getJSON(){
        $objectPerPage = 10;

        $users = Accounts::select('id','Code','Balance')->where('idUser',1)->offset(10)->limit(10)->get();
        $count = Accounts::where('idUser',1)->count();


         //$collection = collect($users);
         //print_r($collection->values()->all());
        $i=0;
        foreach($users as $user){
            $conllection = collect($user);
            $users[$i] = $conllection->values()->all();
            $i++;
        }

        //print_r($users);

        $output = array(
           "recordsTotal" => $count,
            "recordsFiltered" => $count,
            "data" => $users,
        );
        $json = json_encode($output);
        echo $json;

    }







}
