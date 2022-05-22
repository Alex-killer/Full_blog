@extends('blog.layouts.master')

@section('content')

    <h1>{{ $post->title }}</h1>

        {!! $post->description !!}

    @foreach($post->tags as $tag)
    <a class="btn btn-primary" href="{{ route('blog.tag', $tag->title) }}" role="button">#{{ $tag->title }}</a>
    @endforeach
    <hr>

    <div class="mt-5">
        <h4 class="mb-4">Комментарии</h4>

            @foreach($post->comments as $comment)
                <p>{{ $comment->description }}</p>
                <p><small>{{ $comment->created_at->diffForHumans() }}</small></p>
            @endforeach

    </div>

    <a href="{{ route('blog.category.index', $post->category->title) }}">Назад</a>

@endsection
