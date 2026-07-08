<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    
     public function index()
     
    {
         $students = Student::all(); 
        // dd('hello');
        return view('student.index',compact('students'));
        
    }

    public function show($id)
{
    $student = Student::findOrFail($id);

    return view('student.show', compact('student'));
}

     public function destroy($id)
{
    Student::findOrFail($id)->delete();

    return redirect()->route('student.index')
                     ->with('success', 'Student deleted successfully.');
}


public function edit($id)
{
    $student = Student::findOrFail($id);
    return view('student.edit', compact('student'));
}

public function update(Request $request, $id)
{
    $student = Student::findOrFail($id);

    $student->update([
        'name' => $request->name,
        'email' => $request->email,
        'age' => $request->age,
        'gender' => $request->gender,
    ]);

    return redirect()->route('student.index');
}
    
     public function create()
    {
        return view('student.create');
        
    }
    public function store(Request $request)
    {
        // dd($request->all());
        Student::create([
             'id' => $request->id,
            'name' => $request->name,
            'age' => $request->age,
            'email' => $request->email,
            'gender' => $request->gender,
        ]);

        
         return back()->with('success', 'Student saved successfully!');

}
}