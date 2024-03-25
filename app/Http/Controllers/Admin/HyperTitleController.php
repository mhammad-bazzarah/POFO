<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\HyperTitleDataTable;
use App\Http\Controllers\Controller;
use App\Models\HyperTitle;
use Illuminate\Http\Request;

class hyperTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(HyperTitleDataTable $dataTable)
    {
        // $titles = HyperTitle::all();
        return $dataTable->render('admin.hyperTitle.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.hyperTitle.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:200']
        ]);
        $hyper = new HyperTitle();
        $hyper->title = $request->title;
        $hyper->save();
        toastr()->success('New Title Created Successfully');
        return redirect('/admin/hyperTitle');
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
        $hyper = HyperTitle::findOrFail($id);
        return view('admin.hyperTitle.edit', compact('hyper'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => ['required', 'max:200']
        ]);
        $hyper = HyperTitle::findOrFail($id);
        $hyper->title = $request->title;
        $hyper->save();
        toastr()->success(' Title Updated Successfully');
        return redirect('/admin/hyperTitle');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $hyper = HyperTitle::findOrFail($id);
        $hyper->delete();
        toastr()->success(' Title Deleted Successfully');
        // return redirect();
    }
}
