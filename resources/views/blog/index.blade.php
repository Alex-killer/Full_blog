@extends('blog.layouts.master')

@section('content')

    <h1>{{ __('Главная') }}</h1>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($posts as $post)
            <div class="col">
                <div class="card">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{!! substr($post->description, 0, 100) !!}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
