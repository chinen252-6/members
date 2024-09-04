<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

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
        $review = new Review();
        $review->title =$request->title;
        $review->body =$request->body;
        $review->rating =$request->rating;
        $review->store_id =$request->store_id;
        $review->save();
        return redirect()->route('review.comment', ['store_id' => $review->store_id])->with('message', '口コミを作成しました');;
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
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
