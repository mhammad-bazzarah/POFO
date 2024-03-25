<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\BlogDataTable;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BlogDataTable $dataTable)
    {
        return $dataTable->render('admin.blogItem.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = BlogCategory::all();
        return view('admin.blogItem.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => ['required', 'max:200'],
            'category_id' => ['required', 'numeric'],
            'description' => ['required', 'max:100'],
            'image' => ['required', 'max:1000', 'image'],
        ]);
        $bi = new Blog();
        $imagePath = handleUpload('image', $bi);
        $bi->title = $request->title;
        $bi->description = $request->description;
        $bi->category_id = $request->category_id;
        $bi->image = $imagePath;

        $bi->save();
        toastr()->success('Blog Item Created Successfully.');
        return redirect(route('admin.blogs.index'));
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
        $blogItem = Blog::findOrFail($id);
        $categories = BlogCategory::all();
        return view('admin.blogItem.edit', compact('blogItem', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'title' => ['required', 'max:200'],
            'category_id' => ['required', 'numeric'],
            'description' => ['required', 'max:100'],
            'image' => ['max:3000', 'image'],
        ]);

        $bi = Blog::findOrFail($id);
        $imagePath = handleUpload('image', $bi);
        $bi->title = $request->title;
        $bi->description = $request->description;
        $bi->category_id = $request->category_id;
        $bi->image = (!empty($imagePath)) ? $imagePath : $bi->image;

        $bi->save();
        toastr()->success('Portfolio Item Updated Successfully.');
        return redirect(route('admin.blogs.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bi = Blog::findOrFail($id);
        deleteFileIfExists($bi->image);
        $bi->delete();
        toastr()->success('Blog Item Deleted Successfully');
    }
}
