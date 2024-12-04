<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class education extends Model
{
    use HasFactory;
    protected $gurded=[];
    protected $fillable = ['user_id','level_id','eduname','startdate','enddate','desc','field'];

    public function education(){
        return $this->hasOne(level::class,'id','level_id');
    }
}
