<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\classes;


class ClassController extends Controller
{
    public function index()
    {
        $classes = classes::all();

        return view('classes.index', compact('classes'));
    }


public function edit($id)
{
    $class = Classes::findOrFail($id);

    return view('classes.edit', compact('class'));
}

public function sections($id)
{
    $class = Classes::findOrFail($id);

    return view('sections.index', compact('class'));
}


public function update(Request $request, $id)
{
    $class = Classes::findOrFail($id);

    $class->update([
        'class_name' => $request->class_name,
    ]);

    return redirect()->route('classes.index');
}

public function destroy($id)
{
    $class = Classes::findOrFail($id);

    $class->delete();

    return redirect()->route('classes.index')
                     ->with('success', 'Class Deleted Successfully');
}



    
    public function store(Request $request)
    {
        $request->validate([
            'class_name' => 'required'
        ]);

       Classes::create([
    'class_name' => $request->class_name,

        ]);

        return redirect()->back()->with('success', 'Class Added Successfully');
    }
}