@extends('blog.personal.layouts.main')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('Посты') }}</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>{{ __('Название') }}</th>
                    <th>{{ __('Описание') }}</th>
                    <th>{{ __('Категория') }}</th>
                    <th>{{ __('Дата создания') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($liked_post as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td><a href="{{ route('blog.personal.post.show', $post->title) }}">{{ $post->title }}</a></td>
                        <td>{!! substr($post->description, 0, 100) !!}</td>
                        <td>{{ $post->category->title }}</td>
                        <td>{{ $post->created_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            @if(count($liked_post))
                {{ $liked_post->links() }}
            @endif
        </div>
    </div>
@endsection
