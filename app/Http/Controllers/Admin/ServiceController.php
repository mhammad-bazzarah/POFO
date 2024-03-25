<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ServicesDataTable;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ServicesDataTable $dataTable)
    {
        return $dataTable->render('admin.services.index');
        // $ser = Service::all();
        // return view('admin.services.index',compact('ser'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->name);
        $request->validate([
            'name' => ['required', 'max:200'],
            'description' => ['required', 'max:500']
        ]);
        $service = new Service();
        $service->name = $request->name;
        $service->description = $request->description;
        $service->save();
        toastr()->success('New Service Added Successfully');
        return redirect(route('admin.service.index'));
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
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'max:200'],
            'description' => ['required', 'max:500']
        ]);
        $service = Service::findOrFail($id);
        $service->name = $request->name;
        $service->description = $request->description;
        $service->save();
        toastr()->success('Service Updated Successfully');
        return redirect(route('admin.service.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        toastr()->success('Service Deleted Successfully');
        // return redirect(route('admin.service.index'));

    }
}
