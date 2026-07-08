<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use App\Models\Classes;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
{
    $class = Classes::findOrFail($id);

    $subjects = Subject::where('class_id', $id)->get();

    return view('subjects.index', compact('class', 'subjects'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
{
    $request->validate([
        'subject_name' => 'required',
    ]);

    Subject::create([
        'class_id' => $id,
        'subject_name' => $request->subject_name,
    ]);

    return redirect()->back()->with('success', 'Subject Added Successfully');
}

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
   public function destroy($id)
{
    $subject = Subject::findOrFail($id);

    $subject->delete();

    return redirect()->back()->with('success', 'Subject Deleted Successfully');
}
}
