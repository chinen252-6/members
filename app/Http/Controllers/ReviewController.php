<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Region;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($store_id)
{
    return view('review.comment', ['store_id' => $store_id]);
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputs=request()->validate([
            'title'=>'required|max:255',
            'body'=>'required|max:1000',
            'image'=>'image|max:1024',
            'rating' => 'required|integer|between:1,5',
        ]);



        $review = new Review();
        $review->title =$request->title;
        $review->body =$request->body;
        $review->rating =$request->rating;
        $review->store_id =$request->store_id;
        if (request('image')){
            $original = request()->file('image')->getClientOriginalName();
            $name = date('Ymd_His').'_'.$original;
            request()->file('image')->move('storage/images', $name);
            $review->image = $name;
        }
        $review->save();
        return redirect()->route('review.comment', ['store_id' => $review->store_id])->with('message', '口コミを作成しました');;
    }

    /**
     * Display the specified resource.
     */
    public function show($id,Store $store)
    {
        $review = Review::findOrFail($id);
        
        $region = Region::find($store->region_id);
        $region_name = $region ? $region->name : '地域未設定';
    
        $reviews = $store->reviews; // リレーションが設定されていることを前提

        
        return view('review.show', compact('review','store', 'region_name', 'reviews'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}
