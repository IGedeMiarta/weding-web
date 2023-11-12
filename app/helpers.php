<?php

function logoUrl()
{
    return asset('assets/images/logo-dark.png');
}
function logoUrlSm(){
    return asset('assets/images/logo-sm.png');
}

function rp($harga){
    return 'Rp '.number_format($harga, 0, ',', '.');
}
function k($number){
    if ($number >= 1000) {
        $number = number_format($number/1000).'K';
    }
    return 'IDR '.$number;
}
function stsBayar($id){
    if($id==1){
        return 'Menunggu Bayar';
    }elseif($id==2){
        return 'Menunggu Konfirmasi';
    }elseif($id ==4){
         return 'Pembayaran Ditolak';
    }else{
         return 'Pembayaran Berhasil';
    }
}
function bonusMitra($amount){
    $bonusMitra = 0.2;
    return  $amount * $bonusMitra;
}
function trxSystem($amount){
    $bonusMitra = 0.2;
    $mitra = $amount * $bonusMitra;
    return $amount - $mitra;
}