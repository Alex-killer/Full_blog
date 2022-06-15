@extends('blog.personal.layouts.main')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('Комментарии') }}</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>{{ __('Описание') }}</th>
                    <th>{{ __('Дата создания') }}</th>
                    <th style="width: 30px">{{ __('Действия') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($comments as $comment)
                    <tr>
                        <td>{{ $comment->id }}</td>
                        <td>{!! substr($comment->description, 0, 100) !!}</td>
                        <td>{{ $comment->created_at }}</td>
                        <td class="project-actions text-center">
                            <a class="btn btn-info btn-sm" href="{{ route('blog.personal.comment.edit', $comment->id) }}">
                                <i class="fas fa-pen">
                                </i>
                            </a>
                            <form method="POST" action="{{ route('blog.personal.comment.delete', $comment->id) }}"
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
    </div>
@endsection
