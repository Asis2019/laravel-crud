@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4>{{ $book->title }}</h4>
            </div>
            <div class="card-body">
                <p>Author: {{ $book->author }}</p>
                <p>Published on: {{ $book->publishing_date }}</p>
                <p>Entry recorded on: {{ $book->created_at }}</p>
            </div>
        </div>
    </div>
@endsection
