<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Acara extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function mempelai(){
        $mempelai = json_decode($this->mempelai,true);
        return $mempelai['pria']['name'] . ' & ' . $mempelai['wanita']['name'];
    }

    public function alamat(){
        $alamat = json_decode($this->alamat,true);
        return $alamat;
    }
    public function galleries(){
        return $this->hasMany(Gallery::class);
    }
    
    //mempelai array 
    // {
    //     "pria":{
    //          "name":"Putu Bayu Ananta",
    //          "nickname:"Bayu",
    //          "ayah":"I Made Kom (Alm)",
    //          "ibu" : "Ni Nyoman BB",
    //          "alamat":"Bantas Bale Agung"
    //         },
    //     "wanita":{
    //          "name":"Putu Bayu Ananta",
    //          "nickname:"Bayu",
    //          "ayah":"I Made Kom (Alm)",
    //          "ibu" : "Ni Nyoman BB",
    //          "alamat":"Bantas Bale Agung"
    //         }     
    // }
}
