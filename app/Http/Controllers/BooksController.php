<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class BooksController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $books = Book::orderBy('title', 'asc')->paginate(10);
        return view('books.index')->with('books', $books);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     * @throws ValidationException
     */
    public function store(Request $request) {
        $this->validate($request, [
            'title' => 'required',
            'author' => 'required',
            'publishing_date' => ['required', 'date'],
        ]);

        $book = new Book();
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->publishing_date = $request->input('publishing_date');
        $book->save();

        return redirect('/books');
    }

    /**
     * Display the specified resource.
     * @param int $id
     * @return Application|Factory|View
     */
    public function show(int $id) {
        return view('books.show')->with('book', Book::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id) {
        return view('books.edit')->with('book', Book::find($id));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Application|RedirectResponse|Redirector
     * @throws ValidationException
     */
    public function update(Request $request, int $id) {
        $this->validate($request, [
            'title' => 'required',
            'author' => 'required',
            'publishing_date' => ['required', 'date'],
        ]);

        $book = Book::find($id);
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->publishing_date = $request->input('publishing_date');
        $book->save();

        return redirect('/books/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy(int $id) {
        $book = Book::find($id);
        $book->delete();
        return redirect('/books');
    }
}
