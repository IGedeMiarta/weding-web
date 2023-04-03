<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\App;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'phone',
        'username',
        'password',
        'mitra_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function saldo(){
        return "Rp " . number_format($this->saldo, 0, ',', '.');
    }
    public function profilePic(){
        if($this->id == 1){
            return asset('assets/images/profile.jpg');
        }else{
            if($this->mitra->logo != null){
                return asset($this->mitra->logo);
            }else{
                return asset('assets/images/users/user-1.jpg');
            }
        }
    }
    public function mitra(){
        return $this->belongsTo(Mitra::class,'mitra_id');
    }
    public function suport(){
        return $this->hasMany(Support::class);
    }
    public function acara(){
        return $this->hasMany(Acara::class);
    }
}
