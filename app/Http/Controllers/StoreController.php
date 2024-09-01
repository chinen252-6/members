<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Region;

use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $region_id = $request->input('region_id');
    $region_name = null; // 地域名を格納する変数を初期化

    if ($region_id) {
        $stores = Store::where('region_id', $region_id)->get();

        // region_id に対応する地域名を取得
        $region = Region::find($region_id);
        if ($region) {
            $region_name = $region->name; // 地域名を取得
        }
    } else {
        $stores = Store::all();
    }

    // 取得した店舗情報と地域名をビューに渡す
    return view('store.index', compact('stores', 'region_name'));
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
        $inputs = $request->validate([
            'store_name' => 'required|max:20',
            'subject' => 'required|max:50',
            'introduction' => 'required|max:1000',
            'tel' => 'nullable|max:15', // 任意に変更
            'address' => 'required|max:50',
            'address_detail' => 'nullable|max:50', // 任意に変更
            'region_id' => 'required|exists:regions,id',
            'image' => 'nullable|image|max:2048' // 任意に変更
        ]);

        $store = new Store();
        $store->region_id = $request->region_id;
        $store->store_name = $request->store_name;
        $store->subject = $request->subject;
        $store->introduction = $request->introduction;
        $store->tel = $request->tel;
        $store->address = $request->address;

        // address_detailが存在する場合に追加
        if ($request->filled('address_detail')) {
            $store->address .= ' ' . $request->address_detail;
        }

        // 画像がアップロードされた場合のみ処理
        if ($request->hasFile('image')) {
            $original = $request->file('image')->getClientOriginalName();
            $name = date('Ymd_His') . '_' . $original;
            $request->file('image')->move('storage/images', $name);
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
        // storeのregion_idを利用して、関連する地域名を取得
        $region = Region::find($store->region_id);
        $region_name = $region ? $region->name : '地域未設定';
    
        return view('store.show', compact('store', 'region_name'));
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
