<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\WebpEncoder;

class TeamController extends Controller
{
    public function AllTeam()
    {
        $teams = Team::latest()->get();
        return view('admin.backend.team.all_team', compact('teams'));
    }
    public function AddTeam()
    {
        return view('admin.backend.team.add_team');
    }

    public function StoreTeam(Request $request)
    {
        if ($request->file('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . 'webp';
            $manager = ImageManager::usingDriver(Driver::class);
            $img = $manager->decode($image->getPathname());
            $img->resize(306, 400)->encode(new WebpEncoder(80))->save(public_path('upload/team/' . $name_gen));
            $save_url = 'upload/team/' . $name_gen;

            Team::create([
                'name' => $request->name,
                'position' => $request->position,
                'image' => $save_url,
            ]);
            $notification = array(
                'message' => 'Team Inserted successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.team')->with($notification);
        }

        Team::create([
            'name' => $request->name,
            'position' => $request->position,
        ]);

        $notification = array(
            'message' => 'Team Inserted successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.team')->with($notification);
    }


    public function DeleteTeam(Request $request, $id)
    {
        $team = Team::findOrFail($id);
        if ($team->image && file_exists(public_path($team->image))) {
            unlink(public_path($team->image));
        }
        $team->delete();
        $notification = array(
            'message' => 'Team Deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.team')->with($notification);
    }

    public function EditTeam($id)
    {
        $team = Team::findOrFail($id);
        return view('admin.backend.team.edit_team', compact('team'));
    }

    public function UpdateTeam(Request $request, $id)
    {
        $team = Team::findOrFail($id);

        if ($request->file('image')) {

            if ($team->image && file_exists(public_path($team->image))) {
                unlink(public_path($team->image));
            }
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . 'webp';
            $manager = ImageManager::usingDriver(Driver::class);
            $img = $manager->decode($image->getPathname());
            $img->resize(306, 400)->encode(new WebpEncoder(80))->save(public_path('upload/team/' . $name_gen));
            $save_url = 'upload/team/' . $name_gen;

            $team->update([
                'name' => $request->name,
                'position' => $request->position,
                'image' => $save_url,
            ]);
            $notification = array(
                'message' => 'Team Updated successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.team')->with($notification);
        }

        $team->update([
            'name' => $request->name,
            'position' => $request->position,
        ]);

        $notification = array(
            'message' => 'Team Updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.team')->with($notification);
    }
}
