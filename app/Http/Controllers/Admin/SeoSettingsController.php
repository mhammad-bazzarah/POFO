<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeoSetting;
use Illuminate\Http\Request;

class SeoSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seo = SeoSetting::first();
        return view('admin.settings.seo.index', compact('seo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => ['required', 'max:200'],
            'description' => ['required', 'max:500'],
            'keywords' => ['required', 'max:300'],
        ]);

        SeoSetting::updateOrCreate(
            ['id' => $id],
            [
                'title' => $request->title,
                'description' => $request->description,
                'keywords' => $request->keywords
            ]
        );
        toastr()->success('Seo Settings Updated Successfully', 'Congrats');
        return redirect()->back();
    }
}
