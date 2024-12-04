<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exp extends Model
{
    use HasFactory;
    protected $gurded=[];
    protected $fillable = ['user_id','comp_name','comp_desc','exp','startdate','enddate'];
}
