@extends('blog.layouts.master')

@section('content')

    <div>
        <div class="py-4">
            <h1>{{ $post->title }}</h1>

            {!! $post->description !!}
        </div>
        <div class="mt-6">
            @foreach($post->tags as $tag)
                <a class="btn btn-primary" href="{{ route('blog.tag', $tag->title) }}" role="button">#{{ $tag->title }}</a>
            @endforeach
        </div>
    </div>

    <hr>

    <div class="mt-5 col-md-6">
        <h4 class="mb-4">Комментарии</h4>

        <form method="POST" action="{{ route('blog.post.comment.store', $post->title) }}">
            @csrf
            <div>
                <textarea type="text" class="form-control" id="description" name="description"></textarea>
                <input type="hidden" name="post_id" value="{{ $post->title }}">
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-primary">Отправить</button>
            </div>
        </form>
            <div class="mt-4">
                @foreach($post->comments as $comment)
                    {{ $comment->description }}
                    <p class="text-end"><small>{{ $comment->created_at->diffForHumans() }}</small></p>
                @endforeach
            </div>
    </div>

    <a href="{{ route('blog.category.index', $post->category->title) }}">Назад</a>

@endsection
