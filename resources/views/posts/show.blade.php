@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Single Post</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <div>
                                {{ $post->title }} posted by {{ $post->user->name }}
                                <ul>
                                    @foreach($post->comments as $comment)
                                        <li>
                                            {{ $comment->comments}}
                                        </li>
                                    @endforeach
                                </ul>

                            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection