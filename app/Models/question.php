<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    public function getUser(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    use HasFactory;

}
