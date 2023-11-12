<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function index(){
        $data['title'] = 'Invoice';
        if(auth()->user()->id == 1){
            $data['table'] = Invoice::orderByDesc('id')->get();
        }else{
            $data['table'] = Invoice::where('user_id',Auth::user()->id)->orderByDesc('id')->get();
        }
        return view('data.listInvoice',$data);
    }
    public function details(Request $request){
        $data['title'] = 'Invoice '. $request->inv;
        $trx = $request->inv;
        $inv = Invoice::where(['trx'=>$trx])->first();
       
        if(!$inv){
            return back()->with('error','Invoice Not Found');
        }
        $data['trx'] = $trx;
        $details = json_decode($inv->details,true);
        $data['details'] = $details;
        $data['inv'] = $inv;
        return view('data.invoice',$data);
    }
}
