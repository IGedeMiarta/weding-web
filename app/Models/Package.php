<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // public function feature(){
    //     $data = json_decode($this->feature);
    //     $rs = '<p>';
    //     foreach ($data as $key => $value) {
    //         if($key !=9){
    //             $rs .= '<span><i class="fas fa-check text-primary"></i> '.$value.'</span></br>';
    //         }else{
    //             $rs .= '<span><i class="fas fa-check text-primary"></i> '.$value.'('.$this->jml_galery.')</span></br>';
    //         }

    //     }
    //     $rs .= '</p>';
    //     return $rs;
    // }
    public function feature(){
        $data = json_decode($this->feature);
        $featureIn = Feature::whereIn('id',$data)->get();
        $rs = '<p>';
        foreach ($featureIn as $key => $value) {
            if($value->id !=7){
                $rs .= '<span><i class="fas fa-check text-primary"></i> '.$value->feature_name.'</span></br>';
            }else{
                $rs .= '<span><i class="fas fa-check text-primary"></i> '.$value->feature_name.' ('.$this->jml_galery.')</span></br>';
            }
        }
        $featureNotIn = Feature::whereNotIn('id',$data)->get();
        foreach ($featureNotIn as $key => $value) {
            if($value->id !=7){
                $rs .= '<span><i class="fas fa-times text-secondary"></i> '.$value->feature_name.'</span></br>';
            }else{
                $rs .= '<span><i class="fas fa-times text-secondary"></i> '.$value->feature_name.' ('.$this->jml_galery.')</span></br>';
            }
        }
        $rs .= '</p>';
        return $rs;
    }
    public function featurePlan(){
        $data = json_decode($this->feature);
        $featureIn = Feature::whereIn('id',$data)->get();
        $rs = '';
        foreach ($featureIn as $key => $value) {
            if($value->id !=7){
                $rs .= '<li><span><i class="fas fa-check text-primary"></i> '.$value->feature_name.'</span></br></li>';
            }else{
                $rs .= '<li><span><i class="fas fa-check text-primary"></i> '.$value->feature_name.' ('.$this->jml_galery.')</span></li>';
            }
        }
        $featureNotIn = Feature::whereNotIn('id',$data)->get();
        foreach ($featureNotIn as $key => $value) {
            if($value->id !=7){
                $rs .= '<li><span><i class="fas fa-times text-secondary"></i> '.$value->feature_name.'</span></br></li>';
            }else{
                $rs .= '<li><span><i class="fas fa-times text-secondary"></i> '.$value->feature_name.' ('.$this->jml_galery.')</span></li>';
            }
        }
        return $rs;
    }
    public function harga(){
        return "Rp " . number_format($this->harga_disc, 0, ',', '.');
    }
    public function hargaRibu(){
        $number = $this->harga_disc;
        if ($number >= 1000) {
            $number = number_format($number/1000).'K';
        }
        return 'IDR '.$number;
    }
}
