<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();

        return view('books.index', compact('books'));
    }

    public function show(Book $book, $id)
    {
        $book = $book->find($id);
        return view('books.show', compact('book'));
    }

    public function store(BookRequest $request)
    {
        Book::create([
            'title' => $request->title,
            'author' => $request->author
        ]);

        return redirect()->route('books.index');
    }
}
