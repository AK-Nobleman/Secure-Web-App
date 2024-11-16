<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    protected $table = 'your_custom_users_table';

    protected $primaryKey = 'id'; 

    protected $fillable = ['username', 'password'];

    public $timestamps = false;
}
