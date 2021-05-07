<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index()
    {
        $fileName   = 'images/my_image.png';
        $image = Storage::disk('local')->exists('public/' . $fileName) ? asset('storage/' . $fileName) : '';

        return view('admin.dashboard', [
            'image' => $image
        ]);
    }

    public function upload(Request $request) {
        $request->validate([
            'file'     =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $img   = $request->file('file');
        $fileName   = 'my_image.png';

        $success = $img->storeAs('public/images', $fileName);

        if($success) {
            return back()->with('success', 'image uploaded successfully');
        } else {
            return back()->with('status', 'image upload failed');
        }

    }
}
