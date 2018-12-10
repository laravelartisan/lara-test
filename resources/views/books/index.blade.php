@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Books List</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <ul>
                                @foreach($books as $book)
                                    <li>
                                        <a href="{{ route('books.show', $book->id) }}"> {{ $book->title }} </a>  written by {{ $book->author }}
                                    </li>
                                @endforeach
                            </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection