<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FooterUsefulLinksDataTable;
use App\Http\Controllers\Controller;
use App\Models\FooterUsefulLink;
use Illuminate\Http\Request;

class FooterUserfulLinksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FooterUsefulLinksDataTable $dataTable)
    {
        return $dataTable->render('admin.footerUsefulLinks.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.footerUsefulLinks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'url' => 'required'
        ]);
        $useful = new FooterUsefulLink();
        $useful->name = $request->name;
        $useful->url = $request->url;
        $useful->save();

        toastr()->success('New Useful Link Created Successfully');
        return redirect(route('admin.footerUseful.index'));
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
        $useful = FooterUsefulLink::findOrFail($id);
        return view('admin.footerUsefulLinks.edit', compact('useful'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'url' => 'required'
        ]);
        $useful = FooterUsefulLink::findOrFail($id);
        $useful->name = $request->name;
        $useful->url = $request->url;
        $useful->save();

        toastr()->success('Useful Link Updated Successfully');
        return redirect(route('admin.footerUseful.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $useful = FooterUsefulLink::findOrFail($id);
        $useful->delete();
        toastr()->success('Useful Link Deleted Successfully');
        return redirect(route('admin.footerUseful.index'));
    }
}
