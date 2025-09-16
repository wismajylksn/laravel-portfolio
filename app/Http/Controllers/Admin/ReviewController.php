<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Http\Requests\Admin\ReviewRequest;
use Illuminate\Support\Facades\Storage;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::all();
        return view('admin.review.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.review.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Admin\ReviewRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReviewRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasfile('image')) {
            $get_file = $request->file('image')->store('images/reviewers');
            $validated['image'] = $get_file;
        }

        Review::create($validated);

        return to_route('admin.review.index')->with('message', 'Review Added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        return view('admin.review.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Admin\ReviewRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReviewRequest $request, Review $review)
    {
        $validated = $request->validated();

        if ($request->hasfile('image')) {
            if ($review->image != null) {
                Storage::delete($review->image);
            }
            $get_new_file = $request->file('image')->store('images/reviewers');
            $validated['image'] = $get_new_file;
        }

        $review->update($validated);

        return to_route('admin.review.index')->with('message', 'Review Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        if ($review->image != null) {
            Storage::delete($review->image);
        }
        $review->delete();

        return back()->with('message', 'Review Deleted');
    }
}
