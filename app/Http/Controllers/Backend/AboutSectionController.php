<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Title;
use App\Models\Description;
use Illuminate\Http\Request;

class AboutSectionController extends Controller
{
    public function updateRecord(Request $request , $id){
        $title = Title::findOrFail($id);

        $title->update($request->all());
        return response()->json([
        'success' => true,
        'message' => 'Updated successfully!'
    ]);
    }
}
