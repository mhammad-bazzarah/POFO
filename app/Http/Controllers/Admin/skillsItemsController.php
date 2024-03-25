<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\skillsItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\skillsItem;
use Illuminate\Http\Request;

class skillsItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(skillsItemDataTable $dataTable)
    {
        return $dataTable->render('admin.skillsItems.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.skillsItems.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'percent' => ['required', 'numeric', 'max:100']
        ]);
        $si = new skillsItem();
        $si->name = $request->name;
        $si->percent = $request->percent;
        $si->save();
        toastr()->success('Skill Item Created Succefully..');
        return redirect(route('admin.skillsItems.index'));
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
        $si = skillsItem::findOrFail($id);
        return view('admin.skillsItems.edit', compact('si'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'percent' => ['required', 'numeric', 'max:100']
        ]);
        $si = skillsItem::findOrFail($id);
        $si->name = $request->name;
        $si->percent = $request->percent;
        $si->save();
        toastr()->success('Skill Item Updated Succefully..');
        return redirect(route('admin.skillsItems.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $si = skillsItem::findOrFail($id);
        $si->delete();
        toastr()->success('Skill Item Deleted Successfully.');
    }
}
