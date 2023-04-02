<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Acara;
use App\Models\Feature;
use App\Models\Gallery;
use App\Models\Invoice;
use App\Models\Package;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AcaraController extends Controller
{
    public function index(Request $request,$slug){
        $to = ucwords($request->get('to'));
        $acara = Acara::with(['galleries'])->where('slug',$slug)->first();
        $data = [
            'to'    => $to,
            'name'  => $acara->name,
            'mempelai'  => json_decode($acara->mempelai,true),
            'waktu' => $acara->waktu,
            'alamat'    => $acara->alamat(),
            'gallery'   => $acara->galleries

        ];
        return response()->json(['status'=>200,'data'=>$data]);
    }


    public function addAcara(){
        $data['title'] = 'Buat Undangan';
        $inv           = Invoice::where(['user_id'=>auth()->user()->id,'status'=>3])->first();
        $data['inv']   = $inv;
        $data['paket'] = Package::where('id',$inv->details()['id'])->get();
        $data['img']   = Package::find($inv->details()['id']);
        return view('data.buatAcara',$data);
    }
    public function tamu(){
        $data['title'] = 'Undang Tamu';
        $data['table'] = Acara::where('by_user',auth()->user()->id)->get();
        return view('data.tamuUrl',$data);
    }
    
    public function postAcara(Request $request){
        // $request['jam'] = date('Y-m-d h:i:s',strtotime($request->waktu));
        $slugName = Str::slug($request->l_nickname . ' '.$request->p_nickname,'_');
        $slug     = Str::slug($request->nama_acara,'-');
        $inv      = Invoice::find($request->inv);
        $date     = Carbon::parse($request->waktu);
        $mempelai = [
            'pria' => [
                'name' => ucwords($request->l_name),
                'nickname' => strtolower($request->l_nickname),
                'ayah' => ucwords($request->l_ayah),
                'ibu' => ucwords($request->l_ibu),
                'alamat' => ucwords($request->l_alamat),
            ],
            'wanita' => [
                'name' => ucwords($request->p_name),
                'nickname' => ucwords($request->p_nickname),
                'ayah' => ucwords($request->p_ayah),
                'ibu' => ucwords($request->p_ibu),
                'alamat' => ucwords($request->p_alamat),
            ],
        ];
        $alamat = [
            'alamat'=> ucwords($request->alamat),
            'url'   => ucwords($request->maps),
        ];

        DB::beginTransaction();
        try {
            $acara = Acara::create([
                'slug'=> $slug,
                'name' => $request->nama_acara,
                'paket'=> $request->paket,
                'mempelai'=>json_encode($mempelai),
                'alamat'=> json_encode($alamat),
                'waktu' => $date->toDateTimeString(),
                'theme' => 1,
                'by_user'=>auth()->user()->id,
                'status'=>1
            ]);
            $id = $acara->id;
            $num = 1;
            foreach ($request->file('Gambar') as $key => $value) {
                $filename = strtolower($slug).'-'.$num.'.'.$value->getClientOriginalExtension();
                $path = 'images/galery/'.$slugName.'/';
                $value->move(public_path($path), $filename);
                $imgSave = $path.$filename;
                Gallery::create([
                    'acara_id'  => $acara->id,
                    'imgname'   => $imgSave,
                    'ket'       => $slugName
                ]);
                $num++;
            }
            $inv->update(['status'=>5]);
            DB::commit();
            return redirect()->back()->with('success','Data Save');
        } catch (\Throwable $th) {
            DB::rollBack();
            // return redirect()->back()->with('error','Data Error:' .$th->getMessage());
            dd($th->getMessage());
        }
    }
    public function paketDetail($id){
        $paket = Package::find($id);
        $data  = [
            'nama' => $paket->name,
            'harga' => $paket->harga(),
            'fitur' => $paket->feature()
        ];
        $img = '';
        for ($i=1; $i < $paket->jml_galery+1; $i++) { 
            $img .= '<div class="col-md-6">
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-3 col-form-label">Gambar '.$i.'</label>
                            <div class="col-sm-9">
                                <input type="file" name="Gambar[]" class="dropify" data-default-file="" />
                            </div>
                        </div>
                    </div>';
        }
        if($paket->jml_galery==10){
           $img .= '<div class="col-md-12">
                        <label for="staticEmail" class="col-sm-2 col-form-label">Link Video<span class="text-danger">*</span=></label>
                        <div class="col-sm-12 text-center">
                            <input type="url" name="video_url" id="" class="form-control" placeholder="ex: https://www.youtube.com/watch?v=VDOb4BFnmf">  
                         </div>            
                    </div>'; 
        }
        $data['img'] = $img;
        return response()->json(['sts'=>200,'data'=>$data]);
    }
    public function undangan(){
        $user = Auth::user();
        $data['title'] = 'Undangan '.$user->name;
        $data['table'] = Acara::where('by_user',$user->id)->orderByDesc('id')->get();
        
        return view('data.allAcara',$data);
    }
}
