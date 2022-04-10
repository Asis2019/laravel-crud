@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between text-black-50">
            <h2>Books</h2>
            <a href="{{ route('books.create') }}" class="h2 text-black-50">New Book</a>
        </div>

        @if(count($books) >= 1)
            @foreach($books as $book)
                <div class="card p-3 flex-row justify-content-between">
                    <a class="w-content align-items-center d-flex" href="books/{{ $book->id }}">
                        <h4 class="m-0">{{ $book->title }}</h4>
                    </a>
                    <div class="align-self-end d-flex">
                        <a href="{{ route('books.edit', ["book" => $book->id]) }}" class="btn btn-secondary mr-2">Edit</a>
                        <form method="POST" action="{{ route('books.destroy', ["book" => $book->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
            {{ $books->links() }}
        @else
            <p>No books where found.</p>
        @endif
    </div>
@endsection
