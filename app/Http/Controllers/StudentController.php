<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alldata = DB::table('students')->get();
        return view('student.index', [
            "data" => $alldata
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email', // or your table name
            'phone' => 'required|string|min:11|max:15',
            'location' => 'required|string',
        ]);
        $fileName = null;

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = time() . '_' . $file->getClientOriginalName(); // or use uniqid()
            $file->move(public_path('studentPhoto'), $fileName);
        }

        DB::table('students')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'location' => $request->location,
            'photo' => $fileName,
            'created_at' => now()

        ]);

        return redirect()->back()->with('success', 'Student created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('student.show', [
            'data' => $student
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('student.edit', [
            'data' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'location' => 'required',
            'photo' => 'nullable',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'location' => $request->location,
        ];

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = time() . '_' . $file->getClientOriginalName(); // or use uniqid()
            if ($student->photo && file_exists(public_path('studentPhoto/' . $student->photo))) {
                unlink(public_path('studentPhoto/' . $student->photo));
            }
            $file->move(public_path('studentPhoto'), $fileName);
            $data['photo'] = $fileName;
        }
        $student->update($data);

        return redirect()->back()->with('success', 'Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        if ($student->photo && file_exists(public_path('studentPhoto/' . $student->photo))) {
            unlink(public_path('studentPhoto/' . $student->photo));
        }
        $student->delete();
        return redirect()->route('student.index')->with('success', 'student delete successfully');
    }
}
