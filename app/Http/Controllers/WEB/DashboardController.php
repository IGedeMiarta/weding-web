<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home(){
        $data['title'] = 'Dashboard';
        return view('dashboard',$data);
    }
}
