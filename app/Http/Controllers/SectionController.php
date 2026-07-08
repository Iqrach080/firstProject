<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index($id)
    {
        $class = Classes::findOrFail($id);

        $sections = Section::where('class_id', $id)->get();

        return view('sections.index', compact('class', 'sections'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'section_name' => 'required|max:255',
        ]);

        Section::create([
            'class_id' => $id,
            'section_name' => $request->section_name,
        ]);

        return redirect()->back()->with('success', 'Section added successfully.');
    }
    public function edit($id)
{
    $section = Section::findOrFail($id);

    return view('sections.edit', compact('section'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'section_name' => 'required|max:255',
    ]);

    $section = Section::findOrFail($id);

    $section->update([
        'section_name' => $request->section_name,
    ]);

    return redirect()->route('sections.index', $section->class_id)
                     ->with('success', 'Section updated successfully.');
}

public function destroy($id)
{
    $section = Section::findOrFail($id);

    $classId = $section->class_id;

    $section->delete();

    return redirect()->route('sections.index', $classId)
                     ->with('success', 'Section deleted successfully.');
}
}