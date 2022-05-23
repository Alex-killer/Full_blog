@extends('blog.admin.layouts.admin-master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Посты</h3>
        </div>
        <a class="btn btn-primary btn-sm" href="{{ route('blog.admin.post.create') }}" role="button">Создать</a>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Название</th>
                    <th>Дата создания</th>
                    <th style="width: 30px">Действия</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->created_at }}</td>
                        <td class="project-actions text-center">
                            <a class="btn btn-info btn-sm" href="{{ route('blog.admin.post.edit', $post->id) }}">
                                <i class="fas fa-pen">
                                </i>
                            </a>
                            <form method="POST" action="{{ route('blog.admin.post.delete', $post->id) }}"
                                  style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                    <i class="fas fa-trash">
                                    </i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
            @if(count($posts))
                {{ $posts->links() }}
            @endif
        </div>
    </div>
@endsection
