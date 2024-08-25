<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('store.home');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('store.registration');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputs=$request->validate([
            'store_name'=>'required|max:20',
            'subject'=>'required|max:50',           
            'introduction'=>'required|max:1000', 
            'tel'=>'required|max:15',
            'address'=>'required|max:50',
            'image'=>'image|max:2048'
        ]);


        $store=new Store();
            $store->region_id=$request->region_id;

            $store->store_name =$request->store_name;

            $store->subject=$request->subject;
            $store->introduction=$request->subject;
            $store->tel=$request->tel;
            $store->address=$request->address;
            if (request('image')){
                $original = request()->file('image')->getClientOriginalName();
                // 日時追加
               $name = date('Ymd_His').'_'.$original;
               request()->file('image')->move('storage/images', $name);
               $store->image = $name;
            }
            $store->save();
            return redirect()->route('store.create')->with('message', 'お店を登録しました');

    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Store $store)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Store $store)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        //
    }
}
