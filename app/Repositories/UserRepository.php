<?php
namespace App\Repositories;

use App\Repositories\EloquentRepository;

class UserRepository extends EloquentRepository{
    public function getModel()
    {
        // TODO: Implement getModel() method.
        return \App\Models\User::class;
    }
}
?>
