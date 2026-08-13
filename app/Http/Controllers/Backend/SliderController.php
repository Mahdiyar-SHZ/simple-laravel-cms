<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Models\Title;

class SliderController extends Controller
{
    public function GetSlider(Request $request)
    {
        $slider = Slider::find(1);
        return view('admin.backend.slider.get_slider', compact('slider'));
    }

    public function UpdateSlider(Request $request, $id)
    {
        $slider_id = $id;
        $slider = Slider::find($slider_id);
        if ($request->file('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $manager = ImageManager::usingDriver(Driver::class);
            $img = $manager->decode($image->getPathname());
            $img->resize(306, 618)->save(public_path('upload/slider/' . $name_gen));
            $save_url = 'upload/slider/' . $name_gen;

            if (file_exists(public_path($slider->image))) {
                unlink($slider->image);
            }

            $slider->update([
                'title' => $request->title,
                'link' => $request->link,
                'description' => $request->description,
                'image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Slider Updated witd image successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } else {

            $slider->update([
                'title' => $request->title,
                'link' => $request->link,
                'description' => $request->description,
            ]);

            $notification = array(
                'message' => 'Slider Updated without image successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }
    }

    public function ElementUpdate(Request $request,$id)
    {
        $slider = Slider::findOrFail($id);

        if($request->has('title')) {
            $slider->title = $request->title;
        }

        if($request->has('descriptin')) {
            $slider->descriptin = $request->descriptin;
        }



        $slider->save();
        return response()->json(['success' => true]);
    }

    public function FeatureUpdate(Request $request,$id){
        $title = Title::findOrFail($id);

        if($request->has('features')) {
            $title->features = $request->features;
        }

        $title->save();
        return response()->json(['success' => true]);
    }

    public function AnswersUpdate(Request $request,$id){
        $title = Title::findOrFail($id);

        if($request->has('answers')) {
            $title->answers = $request->answers;
        }

        $title->save();
        return response()->json(['success' => true]);
    }
    
    public function ReviewsUpdate(Request $request,$id){
        $title = Title::findOrFail($id);

        if($request->has('reviews')) {
            $title->reviews = $request->reviews;
        }

        $title->save();
        return response()->json(['success' => true]);
    }
}
