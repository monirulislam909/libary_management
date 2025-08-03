<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('book.index');
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
        $request->validate([
            'title' => 'required',
            'author' => 'required',

            'cover' => 'nullable',
            'isbn' => 'required|unique:book,isbn',
            'copies' => 'required',
            'availablecopies' => 'required',
        ]);

        $cover_photo = null;

        if ($request->hasFile('cover')) {
            $file = $request->file('cover');
            $cover_photo = time() . "_" . $file->getClientOriginalName();
            $file->move(public_path('bookPhoto'), $cover_photo);
        }

        DB::table('book')->insert([
            "title" => $request->title,
            "author" => $request->author,
            "isbn" => $request->isbn,
            "copies" => $request->copies,
            "availableCopy" => $request->availablecopies,
            "cover" => $cover_photo,
            "created_at" => now(),
        ]);

        return redirect()->back()->with('success', 'book create successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
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
        //
    }
}
