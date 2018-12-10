@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Posts List</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <ul>
                                @foreach($posts as $post)
                                    <li>
                                        <a href="{{ route('posts.show', $post->id) }}"> {{ $post->title }} </a>  posted by {{ $post->user->name}}
                                    </li>
                                    <ul>
                                        @foreach($post->comments as $comment)
                                            <li>
                                                {{ $comment->comments }}
                                            </li>
                                        @endforeach
                                    </ul>

                                @endforeach
                            </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection