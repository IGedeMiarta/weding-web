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
}
