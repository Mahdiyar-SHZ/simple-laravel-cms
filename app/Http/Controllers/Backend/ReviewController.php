<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ReviewController extends Controller
{
    public function AllReview()
    {
        $reviews = Review::latest()->get();
        return view('admin.backend.review.all_review', compact('reviews'));
    }



    public function Addreview()
    {
        return view('admin.backend.review.add_review');
    }

    public function store(Request $request)
    {
        if ($request->file('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $manager = ImageManager::usingDriver(Driver::class);
            $img = $manager->decode($image->getPathname());
            $img->resize(60, 60)->save(public_path('upload/review/' . $name_gen));
            $save_url = 'upload/review/' . $name_gen;

            Review::create([
                'name' => $request->name,
                'position' => $request->position,
                'message' => $request->message,
                'image' => $save_url,
            ]);
        }

        $notification = array(
            'message' => 'Review Inserted successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.review')->with($notification);
    }

    public function EditReview(Request $request, $id)
    {
        $review = Review::find($id);
        return view('admin.backend.review.edit_review', compact('review'));
    }

    public function UpdateReview(Request $request, $id)
    {
        $review_id = $id;
        if ($request->file('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $manager = ImageManager::usingDriver(Driver::class);
            $img = $manager->decode($image->getPathname());
            $img->resize(60, 60)->save(public_path('upload/review/' . $name_gen));
            $save_url = 'upload/review/' . $name_gen;

            Review::find($review_id)->update([
                'name' => $request->name,
                'position' => $request->position,
                'message' => $request->message,
                'image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Review Updated witdh image successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.review')->with($notification);
        } else {

            Review::find($review_id)->update([
                'name' => $request->name,
                'position' => $request->position,
                'message' => $request->message,
            ]);

            $notification = array(
                'message' => 'Review Updated without image successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.review')->with($notification);
        }
    }

    public function DeleteReview($id)
    {
        $review = Review::findOrFail($id);
        $img = $review->image;
        if(File::exists($img)) {
            unlink($img);
        }

        $review->delete();
        $notification = array(
            'message' => 'Review Deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.review')->with($notification);
    }
}
