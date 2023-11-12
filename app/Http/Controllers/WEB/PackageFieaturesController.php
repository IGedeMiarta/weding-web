<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\Request;
use PDO;

class PackageFieaturesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Fitur';
        $data['table'] = Feature::all();
        return view('data.fitur',$data);
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

        $request->validate(['feature_name'=>'required']);
        try {
            Feature::create($request->all());
            return redirect()->back()->with('success','New Feature Created');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Error: '.$th->getMessage());
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
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $fitur =  Feature::find($id);
        if(!$fitur){
            return redirect()->back()->with('error','Feature Not Found');
        }
        $request->validate(['feature_name'=>'required']);
        try {
            $fitur->update($request->all());
            return redirect()->back()->with('success','Feature Updated');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Error: '.$th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fitur =  Feature::find($id);
        if(!$fitur){
            return redirect()->back()->with('error','Feature Not Found');
        }
        try {
            $fitur->delete();
            return redirect()->back()->with('success','Feature Delete');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Error: '.$th->getMessage());
        }
    }
}
