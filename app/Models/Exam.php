<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    public function getTeacher(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
