<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactSetting;
use Illuminate\Http\Request;

class ContactSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cs = ContactSetting::first();
        if (is_null($cs)) {
            return view('admin.contactSettings.create');
        } else {
            return view('admin.contactSettings.edit', compact('cs'));
        }
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
        $request->validate([
            'title' => ['required', 'max:200'],
            'sub_title' => 'required'
        ]);
        $fb = new ContactSetting();
        $fb->title = $request->title;
        $fb->sub_title = $request->sub_title;
        $fb->save();
        toastr()->success('Contact Settings Created Successfully.');
        return redirect(route('admin.contactSettings.index'));
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
        $fb = ContactSetting::first();
        $fb->title = $request->title;
        $fb->sub_title = $request->sub_title;
        $fb->save();
        toastr()->success('Contact Settings Updated Successfully.');
        return redirect(route('admin.contactSettings.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
