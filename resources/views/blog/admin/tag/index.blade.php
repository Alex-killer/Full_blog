@extends('blog.admin.layouts.admin-master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Теги</h3>
        </div>
        <a class="btn btn-primary btn-sm" href="{{ route('blog.admin.tag.create') }}" role="button">Создать</a>
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
                @foreach($tags as $tag)
                    <tr>
                        <td>{{ $tag->id }}</td>
                        <td>{{ $tag->title }}</td>
                        <td>{{ $tag->created_at }}</td>
                        <td class="project-actions text-center">
                            <a class="btn btn-info btn-sm" href="{{ route('blog.admin.tag.edit', $tag->id) }}">
                                <i class="fas fa-pen">
                                </i>
                            </a>
                            <form method="POST" action="{{ route('blog.admin.tag.delete', $tag->id) }}"
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
            @if(count($tags))
                {{ $tags->links() }}
            @endif
        </div>
    </div>
@endsection
