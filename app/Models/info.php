<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class info extends Model
{
    use HasFactory;
    protected $gurded=[];
    protected $fillable = ['user_id','name','email','phone','address','city'];
    
}
