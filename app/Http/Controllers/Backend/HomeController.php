<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Clarifi;
use App\Models\Connect;
use App\Models\Faq;
use App\Models\App;
use Illuminate\Http\Request;
use App\Models\Feature;
use App\Models\Usability;
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


    public function GetUsability()
    {
        $usability = Usability::findOrFail(1);
        return view('admin.backend.usability.get_usability', compact('usability'));
    }

    public function UpdateUsability(Request $request)
    {
        $usability = Usability::findOrFail(1);

        if ($request->file('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . 'webp';
            $manager = ImageManager::usingDriver(Driver::class);
            $img = $manager->decode($image->getPathname());
            $img->resize(560, 400)->encode(new WebpEncoder(80))->save(public_path('upload/usability/' . $name_gen));
            $save_url = 'upload/usability/' . $name_gen;

            if (!empty($usability->image) && file_exists(public_path($usability->image))) {
                unlink(public_path($usability->image));
            }

            $usability->update([
                'title' => $request->title,
                'link' => $request->link,
                'description' => $request->description,
                'youtube' => $request->youtube,
                'image' => $save_url,
            ]);
        }
        $usability->update([
            'title' => $request->title,
            'link' => $request->link,
            'description' => $request->description,
            'youtube' => $request->youtube,
        ]);


        $notification = array(
            'message' => 'Usability Updated without image successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function AllConnect()
    {
        $connect = Connect::latest()->get();
        return view('admin.backend.connect.all_connect', compact('connect'));
    }
    public function AddConnect()
    {
        return view('admin.backend.connect.add_connect');
    }

    public function StoreConnect(Request $request)
    {
        Connect::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        $notification = array(
            'message' => 'Connect Inserted successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.connect')->with($notification);
    }

    public function DeleteConnect($id)
    {
        Connect::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Connect Deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.connect')->with($notification);
    }

    public function EditConnect(Request $request, $id)
    {
        $connect = Connect::findOrFail($id);

        $column = $request->input('column');
        $value = $request->input('value');

        if ($column && in_array($column, ['title', 'description'])) {
            $connect->$column = $value;
            $connect->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Invalid column'], 400);
    }

    public function AllFaq()
    {
        $faq = Faq::latest()->get();
        return view('admin.backend.faq.all_faq', compact('faq'));
    }

    public function AddFaq()
    {
        return view('admin.backend.faq.add_faq');
    }

    public function StoreFaq(Request $request)
    {
        Faq::create([
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        $notification = array(
            'message' => 'Faq Create successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.faq')->with($notification);
    }

    public function DeleteFaq(Request $request, $id)
    {
        $faq = Faq::findOrFail($id);
        $faq->delete();
        $notification = array(
            'message' => 'Faq Deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.faq')->with($notification);
    }

    public function EditFaq($id)
    {
        $faq = Faq::findOrFail($id);

        return view('admin.backend.faq.edit_faq', compact('faq'));
    }

    public function UpdateFaq(Request $request, $id)
    {
        $faq = Faq::findOrFail($id);

        $faq->update($request->only(['question', 'answer']));

        $notification = array(
            'message' => 'Faq Update successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.faq')->with($notification);
    }


    public function EditApp(Request $request, $id)
    {
        $app = App::findOrFail($id);

        $app->update($request->only('title', 'description'));

        return response()->json(['success' => true, 'message' => 'Update Successfully']);
    }


    public function EditAppImage(Request $request, $id)
    {
        $app = App::findOrFail($id);
        if ($request->file('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . 'webp';
            $manager = ImageManager::usingDriver(Driver::class);
            $img = $manager->decode($image->getPathname());
            $img->resize(306, 481)->encode(new WebpEncoder(80))->save(public_path('upload/apps/' . $name_gen));
            $save_url = 'upload/apps/' . $name_gen;

            if (!empty($app->image) && file_exists(public_path($app->image))) {
                unlink(public_path($app->image));
            }

            $app->update([
                'image' => $save_url
            ]);

        return response()->json(['success' => true, 'image_url' => asset($save_url) , 'message' => 'Update Image Successfully']);

        }

        return response()->json(['success' => false , 'message' => 'Update Image Failed'], 400);
    }
}
