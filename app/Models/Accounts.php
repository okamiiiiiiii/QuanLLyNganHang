<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    protected $table='account';

    protected $fillable = [
        'Code', 'Balance', 'idUser',
    ];
}
