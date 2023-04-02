<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function user(){
        return $this->hasOne(User::class);
    }
    public function profilePic(){
        if($this->logo != null){
            return asset($this->logo);
        }else{
            return asset('assets/images/users/user-1.jpg');
        }
    }
}
