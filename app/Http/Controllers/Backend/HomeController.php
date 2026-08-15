<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feature;
use Illuminate\Support\Facades\File;

use Faker\Provider\File as ProviderFile;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

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
}
