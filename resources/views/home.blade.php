@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Book related pages</div>
                <div class="card-body">
                    <a class="btn btn-primary" href="{{ url('books') }}">View all books</a>
                    <a class="btn btn-primary" href="{{ url('books/create') }}">Create a book</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
