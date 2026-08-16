<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Clarifi;
use Illuminate\Http\Request;
use App\Models\Feature;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\WebpEncoder;

class HomeController extends Controller
{
    public function AllFeatures()
    {
        $features = Feature::latest()->get();
        return view("admin.backend.feature.all_feature", compact("features"));
    }

    public function AddFeatures()
    {
        return view("admin.backend.feature.add_feature");
    }

    public function store(Request $request)
    {

        Feature::create([
            'title' => $request->title,
            'icon' => $request->icon,
            'description' => $request->description,
        ]);

        $notification = array(
            'message' => 'Feature Inserted successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.features')->with($notification);
    }

    public function EditFeature($id)
    {
        $feature = Feature::findOrFail($id);
        return view('admin.backend.feature.edit_feature', compact('feature'));
    }

    public function UpdateFeature(Request $request, $id)
    {
        $feature_id = $id;

        Feature::find($feature_id)->update([
            'title' => $request->title,
            'icon' => $request->icon,
            'description' => $request->description,
        ]);

        $notification = array(
            'message' => 'Feature Updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.features')->with($notification);
    }

    public function DeleteFeature($id)
    {
        $feature = Feature::findOrFail($id);
        $icon = $feature->icon;
        if (File::exists($icon)) {
            unlink($icon);
        }
        $feature->delete();

        $notification = array(
            'message' => 'Feature Deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.features')->with($notification);
    }



    public function GetClarifi()
    {
        $clarifi = Clarifi::find(1);
        return view('admin.backend.clarifi.get_clarifi', compact('clarifi'));
    }

    public function UpdateClarifi(Request $request, $id)
    {
        $clarifi_id = $id;
        $clarifi = Clarifi::find($clarifi_id);
        if ($request->file('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . 'webp';
            $manager = ImageManager::usingDriver(Driver::class);
            $img = $manager->decode($image->getPathname());
            $img->resize(306, 618)->encode(new WebpEncoder(80))->save(public_path('upload/clarifi/' . $name_gen));
            $save_url = 'upload/clarifi/' . $name_gen;

            if (!empty($clarifi->image) && file_exists(public_path($clarifi->image))) {
                unlink(public_path($clarifi->image));
            }

            $clarifi->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Clarifi Updated witd image successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } else {

            $clarifi->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);

            $notification = array(
                'message' => 'Clarifi Updated without image successfully',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        }
    }
}
