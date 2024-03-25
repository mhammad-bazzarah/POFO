<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FeedbackSettings;
use Illuminate\Http\Request;

class feedbackSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fb = FeedbackSettings::first();
        if (is_null($fb))
            return view('admin.feedbackSettings.create');
        else
            return view('admin.feedbackSettings.edit', compact('fb'));
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
        $fb = new FeedbackSettings();
        $fb->title = $request->title;
        $fb->sub_title = $request->sub_title;
        $fb->save();
        toastr()->success('Feedback Settings Created Successfully.');
        return redirect(route('admin.feedbackSettings.index'));
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
        $fb = FeedbackSettings::first();
        $fb->title = $request->title;
        $fb->sub_title = $request->sub_title;
        $fb->save();
        toastr()->success('Feedback Settings Updated Successfully.');
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
