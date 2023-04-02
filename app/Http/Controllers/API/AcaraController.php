<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Acara;
use Illuminate\Http\Request;

class AcaraController extends Controller
{
    public function getAcara($slug){
        $acara = Acara::where('slug',$slug)->first();
        $mempelai = json_decode($acara->mempelai,true);
        $data = [
            'name'      => 'Pewiwahan '. $mempelai['pria']['nickname'] .' & '.$mempelai['wanita']['nickname'], 
            'mempelai'  => $mempelai,
            'alamat'    => json_decode($acara->alamat,true),
            'waktu'     => $acara->waktu,
        ];
        return response()->json(['status'=>200,'msg'=>'Pewiwahan '. $mempelai['pria']['nickname'] .' & '.$mempelai['wanita']['nickname'],'data'=>$data]);
    }
}
