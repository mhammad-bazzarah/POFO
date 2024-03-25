<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DataTables\CategoryDataTable;
use App\Models\PortfolioItem;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.portfolioCategory.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.portfolioCategory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $cat = new Category();
        $cat->name = $request->name;
        $cat->slug = \Str::slug($request->name);
        $cat->save();
        toastr()->success('Category Created Succefully.');
        return redirect(route('admin.portfolioCategory.index'));
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
        $cat = Category::findOrFail($id);
        return view('admin.portfolioCategory.edit', compact('cat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $cat = Category::findOrFail($id);
        $cat->name = $request->name;
        $cat->slug = \Str::slug($request->name);
        $cat->save();
        toastr()->success('Category Updated Succefully.');
        return redirect(route('admin.portfolioCategory.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cat = Category::findOrFail($id);
        $hasItems = PortfolioItem::where('category_id', $cat->id)->count();
        if ($hasItems == 0) {
            $cat->delete();
            toastr()->success('Category Deleted Successfully.');
        } else {
            return response(['status' => 'error']);
        }
    }
}
