<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $old = DB::table('books')->get();
        return view('book.index', [
            'data' => $old
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'cover' => 'nullable',  // Validate as image file
            'isbn' => 'required|unique:books,isbn',
            'copies' => 'required',
            'available_copy' => 'required',
        ]);

        $cover_photo = null;

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $cover_photo = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('bookPhoto'), $cover_photo);
        }

        DB::table('books')->insert([
            'title' => $request->title,
            'author' => $request->author,
            'isbn' => $request->isbn,
            'copies' => $request->copies,
            'available_copy' => $request->available_copy,
            'cover' => $cover_photo,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Book created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('book.show', [
            'data' => $book
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        if ($book->cover && file_exists(public_path('bookPhoto/' . $book->cover))) {
            unlink(public_path('bookPhoto/' . $book->cover));
        }

        $book->delete();
        return redirect()->route('student.index')->with('success', 'student delete successfully');
    }
}
