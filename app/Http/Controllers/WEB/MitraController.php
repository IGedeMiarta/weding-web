<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Mitra;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Mitra';
        $data['table'] = Mitra::all();
        return view('data.mitra',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $name = Str::slug($request->name,'-');
        if($request->file('logo')){
            $file= $request->file('logo');
            $filename= strtolower($name).'.'.$file->getClientOriginalExtension();
            $path = 'images/logo/';
            $file->move(public_path($path), $filename);
            $imgSave = $path.$filename;
        }
        DB::beginTransaction();
        try {
            $mitra = Mitra::create([
                'slug'          => $name,
                'name'          => $request->name,
                'person'        => $request->person,
                'phone'         => $request->phone,
                'is_busines'    => $request->is_bisnis=="on"?true:false,
                'url'           => $request->url,
                'logo'          => $request->file('logo')?$imgSave:null
            ]);
           
             User::create([
                'username'  => $request->person,
                'name'      => $request->name,
                'password'  => Hash::make($request->phone),
                'phone'     => $request->phone,
                'mitra_id'  => $mitra->id
            ]);
            DB::commit();
            return back()->with('success','Mitra Ditambahkan');
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
