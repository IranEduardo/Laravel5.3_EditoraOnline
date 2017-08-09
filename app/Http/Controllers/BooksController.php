<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Http\Requests\BookRequest;

/**
 * Class BooksController
 * @package App\Http\Controllers
 */
class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private function all_authors()
    {
        $authors = Author::all();
        $all_authors = [];

        foreach ($authors as $author) {
            $all_authors[$author->id] = $author->name;
        }
        return $all_authors;


    }

    public function index()
    {
        $books = Book::query()->paginate(10);
        return view('books.index',compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = $this->all_authors();
        return view('books.create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\BookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        Book::create($request->all());
        return redirect()->route('books.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\BookRequest  $request  $request
     * @param  Book $book
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, Book $book)
    {
        $book->fill($request->all());
        $book->save();
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Book $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');

    }
}
