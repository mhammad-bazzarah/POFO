<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioSettings;
use Illuminate\Http\Request;

class PortfolioSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ps = PortfolioSettings ::first();
        if(is_null($ps))
            return view('admin.portfolioSettings.create');
        else
            return view('admin.portfolioSettings.edit',compact('ps'));
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
        $ps = new PortfolioSettings();
        $ps->title = $request->title;
        $ps->sub_title = $request->sub_title;
        $ps->save();
        toastr()->success('Portfolio Settings Created Successfully.');
        return redirect(route('admin.portfolioSettings.index'));
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
        $ps =PortfolioSettings::first();
        $ps->title = $request->title;
        $ps->sub_title = $request->sub_title;
        $ps->save();
        toastr()->success('Portfolio Settings Updated Successfully.');
        return redirect(route('admin.portfolioSettings.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
