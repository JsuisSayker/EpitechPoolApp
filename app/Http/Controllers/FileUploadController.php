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

    public  function dropzoneUi()
    {
        return view('upload-view');
    }

    /**
     * File Upload Method
     *
     * @return void
     */

    public  function dropzoneFileUpload(Request $request)
    {
        $image = $request->file('file');

        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images'), $imageName);

        return response()->json(['success' => $imageName]);
    }
}
