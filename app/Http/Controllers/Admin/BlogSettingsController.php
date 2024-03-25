<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogSetting;
use Illuminate\Http\Request;

class BlogSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bs = BlogSetting::first();
        if (is_null($bs)) {
            return view('admin.blogSettings.create');
        } else {
            return view('admin.blogSettings.edit', compact('bs'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:200'],
            'sub_title' => 'required'
        ]);
        $bs = new BlogSetting();
        $bs->title = $request->title;
        $bs->sub_title = $request->sub_title;
        $bs->save();
        toastr()->success('BlogSettings Created Successfully.');
        return redirect(route('admin.blogSettings.index'));
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
            'title' => ['required', 'max:200'],
            'sub_title' => 'required'
        ]);
        $bs = BlogSetting::first();
        $bs->title = $request->title;
        $bs->sub_title = $request->sub_title;
        $bs->save();
        toastr()->success('BlogSettings Updated Successfully.');
        return redirect(route('admin.blogSettings.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
