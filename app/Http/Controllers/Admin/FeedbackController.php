<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\FeedbacksDataTable;
use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FeedbacksDataTable $dataTable)
    {
        return $dataTable->render('admin.feedback.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.feedback.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'description' => 'required',
        ]);
        $fb = new Feedback();
        $fb->name = $request->name;
        $fb->position = $request->position;
        $fb->description = $request->description;
        $fb->save();
        toastr()->success('FeedBack Created Successfully.');
        return redirect(route('admin.feedback.index'));
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
        $feedback = FeedBack::findOrFail($id);
        return view('admin.feedback.edit', compact('feedback'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'name' => 'required',
            'position' => 'required',
            'description' => 'required',
        ]);
        $fb = Feedback::findOrFail($id);
        $fb->name = $request->name;
        $fb->position = $request->position;
        $fb->description = $request->description;
        $fb->save();
        toastr()->success('FeedBack updated Successfully.');
        return redirect(route('admin.feedback.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fb = Feedback::findOrFail($id);
        $fb->delete();
        toastr()->success('Feedback Deleted Succefully.');
    }
}
