<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    protected $table = 'photo';
    public $timestamps = false;
    protected $fillable = ['family_id', 'image_name', 'image_path','username','password'];
}
