<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Model;


class Petugas extends Model
{
    use HasFactory;

    protected $table = 'petugas';

    protected $fillable = [
        'name',
        'username',
        'password',
        'telp',
        'email',
        'level',
    ];
}
