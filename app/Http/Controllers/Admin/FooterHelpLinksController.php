<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FooterHelpLinksDataTable;
use App\Http\Controllers\Controller;
use App\Models\FooterHelpLink;
use Illuminate\Http\Request;

class FooterHelpLinksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FooterHelpLinksDataTable $dataTable)
    {
      return   $dataTable->render('admin.footerHelpLinks.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.footerHelpLinks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required' ,
            'url'=> 'required'
        ]);
        $useful = new FooterHelpLink();
        $useful->name = $request->name;
        $useful->url = $request->url;
        $useful->save();

        toastr()->success('New Useful Link Created Successfully');
        return redirect(route('admin.footerHelp.index'));
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
        $help = FooterHelpLink::findOrFail($id);
        return view('admin.footerHelpLinks.edit',compact('help'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required' ,
            'url'=> 'required'
        ]);
        $useful = FooterHelpLink::findOrFail($id);
        $useful->name = $request->name;
        $useful->url = $request->url;
        $useful->save();

        toastr()->success('Useful Link Updated Successfully');
        return redirect(route('admin.footerHelp.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $useful = FooterHelpLink::findOrFail($id);
        $useful->delete();
        toastr()->success('Help Link Deleted Successfully');
        return redirect(route('admin.footerHelp.index'));
    }
}
