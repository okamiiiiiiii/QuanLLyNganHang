<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Accounts;
use App\Models\User;
use App\Http\Requests\AccountCreateRequest;
use phpDocumentor\Reflection\DocBlock\Description;
use App\Http\Controllers\SSP;


class AccountController extends Controller
{
    public function index(){
        return view('front-end/showAllAccounts');
    }

    public function create(){
        return view('front-end/createAccount');
    }
    public function show($id)
    {
        $idUser = $id;
        $accounts = User::find($idUser)->Account;

        return view('front-end/showInfo', compact('accounts', 'idUser'));
    }

    public function store(AccountCreateRequest $request, $id)
    {
        print_r($request->input());
        $code = $request->input('code');
        $balance = $request->input('balance');
        Accounts::create(['Code' => $code, 'Balance' => $balance, 'idUser' => $id]);
        return redirect('users/' . $id);
    }

    public function update(AccountCreateRequest $request, $id)
    {
        $newCode = $request->input('code');
        $newBalance = $request->input('balance');

        $account = Accounts::find($id);
        $account->Code = $newCode;
        $account->Balance = $newBalance;
        $account->save();
        return redirect('users/' . $account->idUser);
    }

    public function edit($id){
        $account = Accounts::find($id);
        return view('front-end/editAccount',compact('account'));
    }

    public function delete(Request $request, $id)
    {
        $account = Accounts::find($id);
        $account->delete();
        return redirect('users/' . explode('/', $request->url())[6]);
    }

    public function getJSON(Request $request, $id)
    {
        $Start = $request->input('RecordsStart');
        $Limit = $request->input('PageSize');

        $accounts = Accounts::select('account.id', 'Code', 'Balance', 'name')
            ->with('User')
            ->where('idUser', $id)
            ->offset($Start)
            ->limit($Limit)
            ->get()->toArray();
        //$countFilter = count($accounts);
        $countTotal = Accounts::where('idUser', $id)->count();


        $output = [
            "recordsTotal" => $countTotal,
            "recordsFiltered" => $countTotal,
            "data" => $accounts,
        ];
        $json = json_encode($output);
        echo $json;
    }

    public function getAllJSON(Request $request)
    {
        $Start = $request->input('RecordsStart');
        $Limit = $request->input('PageSize');

        $accounts = Accounts::select('account.id', 'Code', 'Balance', 'name')
            ->with('User')
            ->offset($Start)
            ->limit($Limit)
            ->get();
        $countTotal = Accounts::count();


        $output = array(
            "recordsTotal" => $countTotal,
            "recordsFiltered" => $countTotal,
            "data" => $accounts,
        );
        $json = json_encode($output);
        echo $json;
    }
}
