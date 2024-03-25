<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Helper\Helpers;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $about = About::first();
        if (is_null($about))
            return view('admin.about.create');
        else
            return view('admin.about.edit', compact('about'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' =>     ['required', 'max:200'],
            'description' => ['required'],
            'image' => ['max:3000', 'image'],
            'resume' => ['max:3000', 'mimes:pdf,csv,txt']
        ]);

        $about = About::first();
        $imagePath  = handleUpload('image', $about);
        $resumePath = handleUpload('resume', $about);

        about::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'description' => $request->description,
                'image' => (!empty($imagePath)) ? $imagePath : $about->image,
                'resume' => (!empty($resumePath)) ? $resumePath : $about->resume
            ]
        );
        toastr()->success("Updated Successfully");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function resumeDownload()
    {
        $about = About::first();
        return response()->download(public_path($about->resume));
    }
}
