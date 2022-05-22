@extends('blog.layouts.master')

@section('content')

    <h1>{{ __('Посты') }}</h1>

    <ul class="nav justify-content-center mb-3">
        @include('blog.includes.category')
    </ul>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($posts as $post)
        <div class="col">
            <div class="card">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <a href="{{ route('blog.post.show', $post->title) }}"><h5 class="card-title">{{ $post->title }}</h5></a>
                    <p class="card-text">{!! substr($post->description, 0, 100) !!}</p>
                </div>
            </div>
        </div>
        @endforeach
        @if(count($posts))
            {{ $posts->links() }}
        @endif
    </div>

@endsection
