<?php
namespace App\Services;

interface UserInterface{
    public function getAll();

    public function getById($id);

    public function Add(array $attribute);

    public function Edit($id, array $attribute);

    public function Delete($id);
}
?>
