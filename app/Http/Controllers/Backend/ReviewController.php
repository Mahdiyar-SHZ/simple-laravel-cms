<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function AllReview()
    {
        $reviews = Review::latest()->get();
        return view('admin.backend.review.all_review', compact('reviews'));
    }

    public function Addreview(Request $request) {
        return view('admin.backend.review.add_review');
    }
}
