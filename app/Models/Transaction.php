<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Transaction extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function amount(){
        return "Rp " . number_format($this->amount, 0, ',', '.');
    }
    public static function deliverSaldo($amount,$id){
        try {
           $user = User::find($id);
            Transaction::create([
                'user_id'       => $user->id,
                'amount'        => bonusMitra($amount),
                'charge'        => 0,
                'post_balance'  => $user->saldo + bonusMitra($amount),
                'type'          => '+',
                'mark'          => 'beli_paket',
                'trx'           => time(),
                'details'       => 'Bonus 20% Pembelian Paket Undangan',
            ]);
            $user->saldo += bonusMitra($amount);
            $user->save();

            $system = User::find(1);
            Transaction::create([
                'user_id'       => $system->id,
                'amount'        => trxSystem($amount),
                'charge'        => 0,
                'post_balance'  => $system->saldo + trxSystem($amount),
                'type'          => '+',
                'mark'          => 'beli_paket',
                'trx'           => time(),
                'details'       => 'Trasaction '.trxSystem($amount). ' Exclude 20% ('.bonusMitra($amount).') Commision To Mitra ',
            ]);
            
            $system->saldo += trxSystem($amount);
            $system->save();
            return true;
        } catch (\Throwable $th) {
            return back()->with('error',$th->getMessage());
        }
    }
}
