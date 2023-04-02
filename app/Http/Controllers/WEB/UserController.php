<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Acara;
use App\Models\Mitra;
use App\Models\Support;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function allUser(){
        $data['title'] = 'All User';
        $data['table'] = User::where('mitra_id','!=',null)->orderByDesc('id')->get();
        return view('users.alluser',$data);
    }
    public function profile($id){
        $user = User::find($id);
        if(!$user){
            return back()->with('error','User Not Found');
        }
        $data['title']  = 'Profile ' .$user->name;
        $data['user']   = $user;
        $data['msg']    = Support::with(['user'])->where('user_id',$id)->orderByDesc('id')->limit(3)->get();
        $data['trx']    = Transaction::where('user_id',$id)->orderByDesc('id')->limit(5)->get();
        $data['acara']  = Acara::where('by_user',$id)->orderByDesc('id')->limit(5)->get();
        // dd($data);
        return view('users.profile',$data);
    }
    public function suport(Request $request,$id){
        
        $user = User::find($id);
        if(!$user){
            return back()->with('error','User Not Found');
        }
        DB::beginTransaction();
        try {
            Support::create([
                'user_id'   => $user->id,
                'mark'      => time(),
                'row'       => 1,
                'msg'       => $request->msg
            ]);
            DB::commit();
            return back()->with('success','Pertanyaan Dikirim');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error','Pertanyaan Gagal Dikirim');
        }
    }

}
