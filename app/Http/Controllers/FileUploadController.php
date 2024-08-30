<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    /**
     * Generate Upload View
     *
     * @return void
    */
    public  function uploadUi()
    {
        return view('upload-view');
    }
    /**
     * File Upload Method
     *
     * @return void
     */
    public  function FileUpload(Request $request)
    {
        $image = $request->file('file');
        $imageName = time().'.'.$image->extension();
        $image->move(public_path('images'),$imageName);
        response()->json(['success'=>$imageName]);
        return redirect('/');
    }
}