<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Models\Invoice;
use App\Models\Package;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Package';
        $data['table'] = Package::all();
        $data['feature'] = Feature::all();
        return view('data.paket',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function buy()
    {
        $data['title'] = 'Beli Paket';
        $data['paket'] = Package::all();
        return view('data.buyPaket',$data);
    }
    public function buyPaket($id)
    {
        $paket = Package::find($id);
        $data['tile'] = 'Beli ' .$paket->name;
        $data['paket'] = $paket;
        $data['admin'] = User::find(1);
        $trxm = time();
        $details = [
                'id'    => $paket->id,
                'trx'   => $trxm,
                'no'    => 1,
                'item'  => $paket->name,
                'desc'  => $paket->feature(),
                'qty'   => 1,
                'harga' => $paket->harga_disc,
                'harga_awal' => $paket->harga_awal,
                'disc' => $paket->disc,
                'total' => $paket->harga_disc
        ];
        $data['details'] = $details;

        Session::put('inv',$details);
        // if(!Session::has('inv')){
        // }
        $tes = Invoice::where('trx',Session::get('inv')['trx'])->first();
        if(!$tes){
            DB::beginTransaction();
            try {
                Invoice::create([
                    'user_id' => auth()->user()->id,
                    'trx'     => $trxm,
                    'details' => json_encode($details),
                    'status'  => 1
                ]);
                DB::commit();
                
            } catch (\Throwable $th) {
                DB::rollBack();
                return back()->with('error','Create Invoice Failed: '.$th->getMessage());
            }
        }
       return view('data.invoice',$data);

    }
    public function bayar($id){
        $data['title'] = 'Lanjut Pembayaran';
        $inv = Invoice::where(['trx'=>$id])->first();
        if(!$inv){
            return back()->with('error','Invoice Not Found');
        }
        $data['trx'] = $id;
        $details = json_decode($inv->details,true);
        $data['details'] = $details;
        $data['inv'] = $inv;
        return view('data.bayar',$data);
    }

    public function bukti(Request $request){
        $update = [];
        if($request->file('bukti')){
            $file= $request->file('bukti');
            $filename= strtolower($request->trx).'.'.$file->getClientOriginalExtension();
            $path = 'images/transfer/';
            $file->move(public_path($path), $filename);
            $imgSave = $path.$filename;
            $update['bukti'] = $imgSave;
            $update['status'] = 2;
        }
        $inv = Invoice::where('trx',$request->trx)->first();
        DB::beginTransaction();
        try {
            if(isset($request->status) && auth()->user()->id == 1){
                $update['status'] = $request->status == 'Valid' ? 3 : 4;
            }
            if($update['status'] == 3){
                $total = $inv->details()['total'];
                $trx = Transaction::deliverSaldo($total,$inv->user_id);
            }
            $inv->update($update);
            
            DB::commit();
            return redirect()->intended('/invoice')->with('success','Invoice Diupdate');
        } catch (QueryException $th) {
            DB::rollBack();
            return redirect()->back()->with('error','Bukti Gagal Disimpan :'. $th->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'harga_disc'=>'required',
            'disc'=>'required',
            'harga_awal'=>'required',
        ]);
        $data = [];
        $test = json_decode($request->checkbox,true);
        // foreach ($test as $key => $value) {
        //     $f=Feature::find($value);
        //     $data += [$key => $f->feature_name];
        // }
        // $paket = Feature::whereNotIn('id',$test)->get();
        // dd($paket);
        // foreach ($paket as $key => $value) {
        //     $data += [$value->id => $value->feature_name ];
        // }
        // dd($data);
        
        DB::beginTransaction();
        try {
            Package::create([
                'name'          => $request->name,
                'harga_disc'    => $request->harga_disc,
                'disc'          => $request->disc,
                'harga_awal'    => $request->harga_awal,
                'feature'       => json_encode($test),
                'jml_galery'    => $request->foto
            ]);
            DB::commit();
            return back()->with('success','Pacakege Add');
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
