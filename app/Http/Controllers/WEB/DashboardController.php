<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Acara;
use App\Models\Mitra;
use App\Models\Support;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home(){
        $data['title'] = 'Dashboard';
        if(auth()->user()->id == 1){
            $data['mitra'] = Mitra::limit(4)->get();
            $data['inbox'] = Support::limit(5)->get();
            $data['acara'] = Acara::all();
            $data['total'] = [
                'saldo' => User::sum('saldo'),
                'mitra' => Mitra::count(),
                'acara' => Acara::count()
            ];
            return view('dashboard',$data);
        }else{
            $data['inbox']    = Support::with(['user'])->where('user_id',auth()->user()->id)->orderByDesc('id')->limit(3)->get();
            $data['acara']  = Acara::where('by_user',auth()->user()->id)->orderByDesc('id')->limit(5)->get();
            $data['total'] = [
                'acara' => Acara::where('by_user',auth()->user()->id)->count()
            ];
            $data['user'] = auth()->user();
            return view('dashboardUser',$data);
        }
    }
}
