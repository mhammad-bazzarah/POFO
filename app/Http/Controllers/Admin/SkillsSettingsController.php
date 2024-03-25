<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SkillsSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SkillsSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ss = SkillsSetting::first();
        if (is_null($ss))
            return view('admin.skillsSettings.create');
        else
            return view('admin.skillsSettings.edit', compact('ss'));
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
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
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
            'sub_title' => ['required'],
            'image' => ['max:3000', 'image'],
        ]);
        $ss = skillsSetting::first();
        $imagePath = handleUpload('image', $ss);
        SkillsSetting::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'image' => (!empty($imagePath)) ? $imagePath : $ss->image,
            ]
        );
        toastr()->success("Skills Settings Updated Successfully");
        return redirect(route('admin.skillsSettings.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
