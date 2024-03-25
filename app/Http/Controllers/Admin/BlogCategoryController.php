<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BlogCategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BlogCategoryDataTable $dataTable)
    {
        return $dataTable->render('admin.blogCategory.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blogCategory.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $cat = new BlogCategory();
        $cat->name = $request->name;
        $cat->slug = \Str::slug($request->name);
        $cat->save();
        toastr()->success('BlogCategory Created Succefully.');
        return redirect(route('admin.blogCategory.index'));
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
        $cat = BlogCategory::findOrFail($id);
        return view('admin.blogCategory.edit', compact('cat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $cat = BlogCategory::findOrFail($id);
        $cat->name = $request->name;
        $cat->slug = \Str::slug($request->name);
        $cat->save();
        toastr()->success('BlogCategory Updated Succefully.');
        return redirect(route('admin.blogCategory.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cat = BlogCategory::findOrFail($id);
        $hasItems = Blog::where('category_id', $cat->id)->count();
        if ($hasItems == 0) {
            $cat->delete();
            toastr()->success('Category Deleted Successfully.');
        } else {
            return response(['status' => 'error']);
        }
    }
}
