<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FooterSocialLinksDataTable;
use App\Http\Controllers\Controller;
use App\Models\FooterSocialLink;
use Illuminate\Http\Request;

class FooterSocialLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FooterSocialLinksDataTable $dataTable)
    {
        return $dataTable->render('admin.footerSocialLinks.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.footerSocialLinks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'icon' => 'required',
            'url' => ['required', 'url'],
        ]);

        $link = new FooterSocialLink();
        $link->icon = $request->icon;
        $link->url = $request->url;
        $link->save();

        toastr()->success('New Social Link Created Successfully', 'success');
        return redirect(route('admin.footerSocial.index'));
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
        $social = FooterSocialLink::findOrFail($id);
        return view('admin.footerSocialLinks.edit', compact('social'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'icon' => 'required',
            'url' => ['required', 'url'],
        ]);

        $link = FooterSocialLink::findOrFail($id);
        $link->icon = $request->icon;
        $link->url = $request->url;
        $link->save();

        toastr()->success('Social Link Updated Successfully', 'success');
        return redirect(route('admin.footerSocial.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $useful = FooterSocialLink::findOrFail($id);
        $useful->delete();
        toastr()->success('Social Link Deleted Successfully');
        return redirect(route('admin.footerSocil.index'));
    }
}
