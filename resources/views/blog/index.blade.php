@extends('blog.layouts.master')

@section('content')

    <h1>{{ __('Главная') }}</h1>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($posts as $post)
            <div class="col">
                <div class="card h-100">
                    <img src="{{ asset('storage/' .$post->preview_image) }}" alt="featured image" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{!! substr($post->description, 0, 100) !!}</p>
                        @auth()
                            <form action="{{ route('blog.post.like.store', $post->id) }}" method="POST">
                                @csrf

                                <button type="submit" class="border-0 bg-transparent">
                                    @if(auth()->user()->likedPosts->contains($post->id))
                                        <i class="fas fa-heart"></i>
                                    @else
                                        <i class="far fa-heart"></i>
                                    @endif
                                </button>
                                <span>{{ $post->liked_users_count }}</span>
                            </form>
                        @endauth
                        @guest()
                            <div>
                                <span>{{ $post->liked_users_count }}</span>
                                <i class="far fa-heart"></i>
                            </div>
                        @endguest
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                    </div>
                </div>
            </div>

        @endforeach
    </div>

@endsection
