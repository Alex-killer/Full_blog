@extends('blog.layouts.master')

@section('content')

    <div>
        <div class="py-4">
            <h1>{{ $post->title }}</h1>

            <img src="{{ asset('storage/' .$post->preview_image) }}" alt="featured image" class="w-50">

            <div class="mt-3">
                {!! $post->description !!}
            </div>
        </div>
        <section class="py-3">
            @auth()
                <form action="{{ route('blog.post.like.store', $post->id) }}" method="POST">
                    @csrf
                    <span>{{ $post->liked_users_count }}</span>
                    <button type="submit" class="border-0 bg-transparent">
                        @if(auth()->user()->likedPosts->contains($post->id))
                            <i class="fas fa-heart"></i>
                        @else
                            <i class="far fa-heart"></i>
                        @endif

                    </button>
                </form>
            @endauth
        </section>
        <div class="mt-6">
            @foreach($post->tags as $tag)
                <a class="btn btn-primary" href="{{ route('blog.tag', $tag->title) }}" role="button">#{{ $tag->title }}</a>
            @endforeach
        </div>
    </div>

    <hr>

    <div class="mt-5 col-md-6">
        <h4 class="mb-4">Комментарии ({{ $post->comments->count() }})</h4>
        @auth()
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
        @endauth
        <div class="mt-4">
            @foreach($post->comments as $comment)
                <div class="form-group">
                    <p class="mb-2"><small>{{ $comment->user->name }}</small></p>
                    {{ $comment->description }}
                    <p class="text-end"><small>{{ $comment->created_at->diffForHumans() }}</small></p>
                </div>
                @endforeach
        </div>
    </div>

    <a href="{{ route('blog.category.index', $post->category->title) }}">Назад</a>

@endsection
