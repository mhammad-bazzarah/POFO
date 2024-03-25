<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exp = Experience::first();
        if (is_null($exp))
            return view('admin.experience.create');
        else
            return view('admin.experience.edit', compact('exp'));
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
        // dd($request->all());
        $request->validate([
            'title' => ['required', 'max:200'],
            'description' => 'required',
            'email' => ['required', 'max:100'],
            'phone' => ['required', 'max:100'],
            'image' => ['image', 'max:1000']
        ]);
        $exp = Experience::first();
        $imagePath = handleUpload('image', $exp);
        Experience::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'description' => $request->description,
                'email' => $request->email,
                'phone' => $request->phone,
                'image' => isset($imagePath) ? $imagePath : $exp->image
            ]
        );
        toastr()->success("Experience Section Updated Successfully");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
