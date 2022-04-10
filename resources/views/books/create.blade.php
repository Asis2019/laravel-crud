@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">{{ __('Create new book') }}</div>
            <div class="card-body">
                <form method="POST" action="{{ route('books.store') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right">Book Title</label>

                        <div class="col-md-6">
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                                   value="{{ old('title') }}" required autocomplete="title" autofocus>

                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right">Book Author</label>

                        <div class="col-md-6">
                            <input id="author" type="text" class="form-control @error('author') is-invalid @enderror" name="author"
                                   value="{{ old('author') }}" required autocomplete="author" autofocus>

                            @error('author')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label text-md-right">Published Date</label>

                        <div class="col-md-6">
                            <input id="publishing_date" type="datetime-local" class="form-control @error('publishing_date') is-invalid @enderror"
                                   name="publishing_date" value="{{ old('publishing_date') }}" required autocomplete="publishing_date" autofocus>

                            @error('publishing_date')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Create') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
