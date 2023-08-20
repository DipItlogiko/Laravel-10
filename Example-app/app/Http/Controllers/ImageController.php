<?php

namespace App\Http\Controllers;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\View\view;
use Illuminate\Http\RedirectResponse;

class ImageController extends Controller
{
    ////__File Upload__////
    public function index(): view
    {
        return view('image'); 
    }

    public function imageUpload(Request $request): RedirectResponse
    {
        ////dd($request->all());

        ////__validation__////
        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048', /////max:2048 it means 2MB
        ]);

        $imageName = time(). '.' .$request->image->extension(); ////time function ta bebohar korar karon hocche jeno image repete na hoy 

        $request->image->move(public_path('images'),$imageName); ///image  will be save public/images

        return redirect()->back()->withSuccess('You have successfully upload image')->with('image',$imageName);
    }
}
