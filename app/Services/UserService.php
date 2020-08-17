<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\User;


class UserService implements UserInterface
{
    protected $user;
    function __constructor(User $user){
        $this->user = $user;
    }

    public function getAll(){
        $list = User::all();
    }
    public function getById($id){
        // TODO: Implement getById() method.
    }
    public function Add(array $attribute){
        // TODO: Implement Add() method.
    }
    public function Edit($id, array $attribute){
        // TODO: Implement Edit() method.
    }
    public function Delete($id){
        // TODO: Implement Delete() method.
    }
}
