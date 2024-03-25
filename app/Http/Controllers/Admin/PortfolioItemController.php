<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\PortfolioItemDataTable;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PortfolioItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Helper\helpers;

class PortfolioItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PortfolioItemDataTable $dataTable)
    {
        return $dataTable->render('admin.portfolioItem.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.portfolioItem.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:200'],
            'category_id' => ['required', 'numeric'],
            'client' => ['max:200'],
            'website' => ['max:200'],
            'description' => ['required', 'max:100'],
            'image' => ['required', 'max:1000', 'image'],
        ]);
        $pi = new PortfolioItem();
        $imagePath = handleUpload('image', $pi);
        $pi->title = $request->title;
        $pi->client = $request->client;
        $pi->description = $request->description;
        $pi->website = $request->website;
        $pi->category_id = $request->category_id;
        $pi->image = $imagePath;

        $pi->save();
        toastr()->success('Portfolio Item Created Successfully.');
        return redirect(route('admin.portfolioItem.index'));
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
        $portfolioItem = portfolioItem::findOrFail($id);
        $categories = Category::all();
        return view('admin.portfolioItem.edit', compact('portfolioItem', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => ['required', 'max:200'],
            'category_id' => ['required', 'numeric'],
            'client' => ['required', 'max:200'],
            'website' => ['required', 'max:200'],
            'description' => ['required', 'max:100'],
            'image' => ['max:3000', 'image'],
        ]);

        $pi = PortfolioItem::findOrFail($id);
        $imagePath = handleUpload('image', $pi);
        $pi->title = $request->title;
        $pi->client = $request->client;
        $pi->description = $request->description;
        $pi->website = $request->website;
        $pi->category_id = $request->category_id;
        $pi->image = (!empty($imagePath)) ? $imagePath : $pi->image;

        $pi->save();
        toastr()->success('Portfolio Item Updated Successfully.');
        return redirect(route('admin.portfolioItem.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pi = PortfolioItem::findOrFail($id);
        deleteFileIfExists($pi->image);
        $pi->delete();
        toastr()->success('Portfolio Item Deleted Successfully');
    }
}
