<?php

namespace App\Http\Controllers;
require 'SSP.php';
use Illuminate\Http\Request;
use App\Models\Accounts;
use App\Models\User;
use App\Http\Requests\AccountCreateRequest;
use phpDocumentor\Reflection\DocBlock\Description;
use App\Http\Controllers\SSP;


class AccountController extends Controller
{
    public function getByID(Request $request, $id)
    {

        $idUser = explode("/", $request->url())[6];
        $accounts = User::find($idUser)->Account;

        return view('front-end/showInfo', compact('accounts', 'idUser'));
    }



    public function getByIDClone(Request $request)
    {
        $idUser = explode("/", $request->url())[6];
        $accounts = Accounts::where('idUser', $idUser)->paginate(10);
        //$accounts = Accounts::paginate(10);

        return view('showAccounts', compact('accounts', 'idUser'));
    }

    public function create(AccountCreateRequest $request, $id)
    {
        $idUser = explode("/", $request->url())[6];
        print_r($request->input());
        $code = $request->input('code');
        $balance = $request->input('balance');
        Accounts::create(['Code' => $code, 'Balance' => $balance, 'idUser' => $idUser]);
        return redirect('users/' . $idUser);
    }

    public function edit(AccountCreateRequest $request)
    {
        $id = explode('/', $request->url())[8];
        //print_r($request->input());
        $newCode = $request->input('code');
        $newBalance = $request->input('balance');

        $account = Accounts::find($id);
        $account->Code = $newCode;
        $account->Balance = $newBalance;
        $account->save();
        return redirect('users/' . $account->idUser);
    }

    public function delete(Request $request)
    {
        $id = explode('/', $request->url())[8];
        $account = Accounts::find($id);
        $account->delete();
        return redirect('users/' . explode('/', $request->url())[6]);
    }
}
